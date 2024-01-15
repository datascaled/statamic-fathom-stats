<template>
  <div>
    <ApexChart
      ref="chart"
      type="bar"
      v-bind="{ options: { ...defaultOptions, xaxis }, series }"
    />
  </div>
</template>

<script>
export default {
  name: "FathomStats",
  props: ["siteId", "defaultOptions"],
  data() {
    return {
      xaxis: {
        categories: [],
      },
      series: [
        {
          data: [],
        },
      ],
    };
  },
  created() {
    this.$axios
      .get(`/fathom/sites/${this.siteId}/aggregations`)
      .then((res) => {
        res.data.forEach((stat) => {
          this.xaxis.categories.push(
            new Date(stat.date).toLocaleDateString(navigator.language, {
              weekday: "short",
              year: "numeric",
              month: "short",
              day: "numeric",
            })
          );
          this.series[0].data.push(stat.pageviews);
        });
      })
      .finally(() => {
        this.$refs.chart.refresh();
      });
  },
};
</script>