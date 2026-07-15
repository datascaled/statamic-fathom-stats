import GeneralStatistics from "./components/GeneralStatistics.vue";
import VisitorsPerDevice from "./components/VisitorsPerDevice.vue";
import VisitorsPerPage from "./components/VisitorsPerPage.vue";
import AverageDuration from "./components/AverageDuration.vue";
import ChartWrapper from "./components/ChartWrapper.vue";
import VueApexCharts from "vue3-apexcharts";

Statamic.booting(() => {
  Statamic.$components.register("ApexChart", VueApexCharts);
  Statamic.$components.register("general-statistics", GeneralStatistics);
  Statamic.$components.register("ChartWrapper", ChartWrapper);
  Statamic.$components.register("visitors-per-device", VisitorsPerDevice);
  Statamic.$components.register("visitors-per-page", VisitorsPerPage);
  Statamic.$components.register("average-duration", AverageDuration);
});
