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
        theme: {
          mode: "light",
          palette: "palette9",
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