<template>
  <ChartWrapper>
    <template v-slot:default="{ defaultOptions }">
      <ApexChart
        class="pb-2"
        ref="chart"
        type="donut"
        v-bind="{ options: { ...defaultOptions, labels }, series }"
      />
    </template>
  </ChartWrapper>
</template>

<script>
export default {
  name: "FathomStats",
  props: ["siteId", "days"],
  data() {
    return {
      series: [],
      labels: [],
    };
  },
  created() {
    this.$axios
      .get(`/fathom/sites/${this.siteId}/aggregations`, {
        params: {
          days: this.days,
          field_grouping: "device_type",
          aggregates: "visits",
        },
      })
      .then((res) => {
        res.data.forEach((stat) => {
          const translationKey = {
            Desktop: "device_desktop",
            Phone: "device_phone",
            Tablet: "device_tablet",
          }[stat.device_type];
          const device_type = translationKey
            ? this.__(`statamic-fathom-stats::fathom-stats.${translationKey}`)
            : stat.device_type;

          if (!this.labels.includes(device_type)) {
            this.labels.push(device_type);
            this.series.push(0);
          }

          this.series[this.labels.indexOf(device_type)] += parseInt(
            stat.visits
          );
        });
      });
  },
};
</script>
