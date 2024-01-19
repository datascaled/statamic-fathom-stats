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
  props: ["siteId"],
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
          days: 30,
          field_grouping: "device_type",
          aggregates: "visits",
        },
      })
      .then((res) => {
        res.data.forEach((stat) => {
          const device_type = this.translate(stat.device_type)

          if (!this.labels.includes(device_type)) {
            this.labels.push(device_type);
            this.series.push(0);
          }

          this.series[this.labels.indexOf(device_type)] += parseInt(
            stat.visits
          );
        });
      })
      .finally(() => {
        this.$refs.chart.refresh();
      });
  },
};
</script>