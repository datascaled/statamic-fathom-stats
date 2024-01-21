<template>
  <div>
    <slot v-bind="{ defaultOptions }" />
  </div>
</template>

<script>
import de from "apexcharts/dist/locales/de.json";
import en from "apexcharts/dist/locales/en.json";

export default {
  name: "FathomStats",
  data() {
    return {
      defaultOptions: {
        stroke: {
          curve: "straight",
        },
        chart: {
          toolbar: {
            show: false,
          },
          locales: [de, en],
          defaultLocale: "en",
        },
        colors: [
          "#78688d",
          "#3A3441",
          "#6C55FD",
          "#D5D4FF",
          "#36189a",
          "#333740",
        ],
      },
    };
  },
};
</script>