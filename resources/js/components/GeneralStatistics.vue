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
  props: ["siteId", "locale"],
  data() {
    return {
      xaxis: {
        type: "datetime",
      },
      series: [],
    };
  },
  methods: {
    fetchPageViews() {
      return this.$axios
        .get(`/fathom/sites/${this.siteId}/aggregations`, {
          params: {
            days: 30,
            aggregates: "pageviews",
          },
        })
        .then((res) => {
          this.series.push({
            name: this.translate("Page views"),
            data: res.data.map((stat) => ({
              x: new Date(stat.date).getTime(),
              y: stat.pageviews,
            })),
          });
        });
    },
    fetchVisitors() {
      return this.$axios
        .get(`/fathom/sites/${this.siteId}/aggregations`, {
          params: {
            days: 30,
            aggregates: "visits",
          },
        })
        .then((res) => {
          this.series.push({
            name: this.translate("Unique visitors"),
            data: res.data.map((stat) => ({
              x: new Date(stat.date).getTime(),
              y: stat.visits,
            })),
          });
        });
    },
  },
  created() {
    Promise.all([this.fetchPageViews(), this.fetchVisitors()]).finally(() => {
      if (this.locale) {
        this.$refs.chart.setLocale(this.locale);
      }
      this.$refs.chart.refresh();
    });
  },
};
</script>