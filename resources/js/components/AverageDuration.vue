<template>
  <ChartWrapper>
    <template v-slot:default="{ defaultOptions }">
      <ApexChart
        ref="chart"
        type="area"
        height="350"
        v-bind="{
          options: { ...defaultOptions, xaxis, dataLabels: { enabled: false } },
          series,
        }"
      />
    </template>
  </ChartWrapper>
</template>

<script>
export default {
  name: "FathomStats",
  props: ["siteId", "locale", "days"],
  data() {
    return {
      xaxis: {
        type: "datetime",
      },
      series: [],
    };
  },
  methods: {
    fetchAverageDuration() {
      return this.$axios
        .get(`/fathom/sites/${this.siteId}/aggregations`, {
          params: {
            days: this.days,
            aggregates: "avg_duration",
          },
        })
        .then((res) => {
          this.series.push({
            name: this.translate("Seconds"),
            data: res.data.map((stat) => ({
              x: new Date(stat.date).getTime(),
              y: Math.floor(stat.avg_duration),
            })),
          });
        });
    },
  },
  created() {
    Promise.all([this.fetchAverageDuration()]).finally(() => {
      if (this.locale) {
        this.$refs.chart.setLocale(this.locale);
      }
      this.$refs.chart.refresh();
    });
  },
};
</script>