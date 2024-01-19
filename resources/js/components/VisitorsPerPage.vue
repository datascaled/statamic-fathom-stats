<template>
  <ChartWrapper>
    <template v-slot:default="{ defaultOptions }">
      <ApexChart
        ref="chart"
        type="bar"
        v-bind="{
          options: {
            ...defaultOptions,
            plotOptions: {
              bar: {
                horizontal: true,
              },
            },
            dataLabels: {
              enabled: true,
              textAnchor: 'start',
              style: {
                fontSize: '13px',
                fontWeight: 'light',
                colors: ['#fff'],
              },
              formatter: function (val, opt) {
                return opt.w.globals.labels[opt.dataPointIndex] + ':  ' + val;
              },
              dropShadow: {
                enabled: true,
                blur: 4,
                color: '#000',
                opacity: 0.7,
              },
            },
            yaxis: {
              labels: {
                show: false,
              },
            },
            xaxis,
          },
          series,
        }"
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
      series: [
        {
          name: "",
          data: [],
        },
      ],
      xaxis: {
        categories: [],
      },
    };
  },
  created() {
    this.$axios
      .get(`/fathom/sites/${this.siteId}/aggregations`, {
        params: {
          days: this.days,
          field_grouping: "pathname",
          date_grouping: "year",
          sort_by: "visits:desc",
          aggregates: "visits",
        },
      })
      .then((res) => {
        res.data.splice(0, 4).forEach(({ pathname, visits }) => {
          if (!this.xaxis.categories.includes(pathname)) {
            this.xaxis.categories.push(pathname);
            this.series[0].data.push(0);
          }

          this.series[0].data[this.xaxis.categories.indexOf(pathname)] +=
            parseInt(visits);
        });
      })
      .finally(() => {
        this.$refs.chart.refresh();
      });
  },
};
</script>