import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/scss/app.scss",
                "resources/js/app.js",
                "resources/js/mijs.js",
                "resources/scss/miestilo.css",
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            $: "jQuery",
        },
    },
    define: {
        "process.env": {


             CDN_JQUERY: JSON.stringify(
                "//cdnjs.cloudflare.com/ajax/libs/prettify/r298/run_prettify.min.js"
            ),
            CDN_DUALLIST: JSON.stringify(
                "https://cdn.jsdelivr.net/npm/bootstrap-duallistbox@3.0.6/dist/jquery.bootstrap-duallistbox.min.js"
            ),

        },
    },
});
