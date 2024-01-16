import PageViews from "./components/PageViews.vue";
import ViewsPerDevice from "./components/ViewsPerDevice.vue";
import ViewsPerPage from "./components/ViewsPerPage.vue";
import ChartWrapper from "./components/ChartWrapper.vue";
import VueApexCharts from "vue-apexcharts";

Vue.use(VueApexCharts);

Statamic.booting(() => {
  Statamic.$components.register("ApexChart", VueApexCharts);
  Statamic.$components.register("PageViews", PageViews);
  Statamic.$components.register("ChartWrapper", ChartWrapper);
  Statamic.$components.register("ViewsPerDevice", ViewsPerDevice);
  Statamic.$components.register("ViewsPerPage", ViewsPerPage);
});
