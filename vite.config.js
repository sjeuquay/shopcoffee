import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import { glob } from "glob";

// console.log(glob.sync("resources/**/*.{js,css,ttf,jpg,svg,png,avif,webb}"));

export default defineConfig({
    plugins: [
        laravel({
            input: [
                ...glob.sync(
                    "resources/**/*.{js,css,ttf,jpg,svg,png,avif,webb,gif,jfif}"
                ),
            ],
            refresh: true,
        }),
    ],
});
