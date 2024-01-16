<template>
  <ChartWrapper>
    <template v-slot:default="{ defaultOptions }">
      <ApexChart
        ref="chart"
        type="pie"
        height="350"
        v-bind="{ options: { ...defaultOptions, xaxis }, series }"
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
      xaxis: {
        type: "datetime",
      },
      series: [
        {
          name: "",
          data: [],
        },
      ],
    };
  },
  created() {
    this.$axios
      .get(`/fathom/sites/${this.siteId}/aggregations`, {
        params: {
          days: 14,
          group_by: 'device',
        },
      })
      .then((res) => {
        res.data.forEach((stat) => {
          this.series[0].data.push({
            x: new Date(stat.date).getTime(),
            y: stat.pageviews,
          });
        });
      })
      .finally(() => {
        this.$refs.chart.refresh();
      });
  },
};
</script>