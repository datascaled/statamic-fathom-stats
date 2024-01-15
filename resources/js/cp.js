import FathomStats from "./components/FathomStats.vue";
import VueApexCharts from "vue-apexcharts";

Vue.use(VueApexCharts);

Statamic.booting(() => {
  Statamic.$components.register("ApexChart", VueApexCharts);
  Statamic.$components.register("FathomStats", FathomStats);
});
