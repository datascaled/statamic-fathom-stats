import laravel from "laravel-vite-plugin";
import statamic from "@statamic/cms/vite-plugin";
import { defineConfig } from "vite";

export default defineConfig(() => {
  return {
    plugins: [
      laravel({
        refresh: true,
        input: ["resources/js/cp.js"],
        publicDirectory: "resources/dist",
      }),
      statamic(),
    ],
  };
});
