import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            "@fonts": "/resources/fonts",
        }
    },
    server: {
        hmr: {
            host: "vp-bildungsgesetz.ddev.site",
            protocol: "wss"
        }
    }
});
