import FathomSite from "./components/FathomSite.vue";

Statamic.booting(() => {
  Statamic.$components.register("fathom-site", FathomSite);
});
