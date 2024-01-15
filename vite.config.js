import laravel from "laravel-vite-plugin";
import { defineConfig } from "vite";
import vue2 from "@vitejs/plugin-vue2";

export default defineConfig(() => {
  return {
    plugins: [
      vue2(),
      laravel({
        refresh: true,
        input: ["resources/js/cp.js"],
        publicDirectory: "resources/dist",
      }),
    ],
  };
});
