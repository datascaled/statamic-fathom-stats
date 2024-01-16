<template>
  <div>
    <slot v-bind="{ defaultOptions }" />
  </div>
</template>

<script>
export default {
  name: "FathomStats",
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