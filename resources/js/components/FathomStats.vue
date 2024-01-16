<template>
  <div>
    <Pageviews v-bind="{ siteId, defaultOptions }" />
  </div>
</template>

<script>
import Pageviews from "./Pageviews.vue";

export default {
  name: "FathomStats",
  props: ["siteId"],
  components: { Pageviews },
  data() {
    return {
      defaultOptions: {
        chart: {
          toolbar: {
            show: false,
          },
        },
        theme: {
          mode: "light",
          monochrome: {
            enabled: true,
            color: "#333740",
          },
        },
      },
    };
  },
};
</script>