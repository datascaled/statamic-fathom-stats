import GeneralStatistics from "./components/GeneralStatistics.vue";
import VisitorsPerDevice from "./components/VisitorsPerDevice.vue";
import VisitorsPerPage from "./components/VisitorsPerPage.vue";
import ChartWrapper from "./components/ChartWrapper.vue";
import VueApexCharts from "vue-apexcharts";

Vue.use(VueApexCharts);

Statamic.booting(() => {
  Statamic.$components.register("ApexChart", VueApexCharts);
  Statamic.$components.register("GeneralStatistics", GeneralStatistics);
  Statamic.$components.register("ChartWrapper", ChartWrapper);
  Statamic.$components.register("VisitorsPerDevice", VisitorsPerDevice);
  Statamic.$components.register("VisitorsPerPage", VisitorsPerPage);
});
