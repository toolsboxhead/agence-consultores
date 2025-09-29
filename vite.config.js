import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import { viteStaticCopy } from "vite-plugin-static-copy";

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
        viteStaticCopy({
            targets: [
                {
                    src: "resources/images/*",
                    dest: "images", // se copiará a public/build/images
                },
            ],
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
