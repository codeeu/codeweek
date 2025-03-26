import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import i18n from 'laravel-vue-i18n/vite';
import tailwindcss from 'tailwindcss';
import autoprefixer from 'autoprefixer';
import fs from 'fs';
import path from 'path';

export default defineConfig({
    server: {
        host: 'codeweek.europa',
        port: 5173,
        https: {
            key: fs.readFileSync(path.resolve(
                process.env.HOME, '.config/valet/Certificates/codeweek.europa.key'
            )),
            cert: fs.readFileSync(path.resolve(
                process.env.HOME, '.config/valet/Certificates/codeweek.europa.crt'
            )),
        },
        headers: {
            'Access-Control-Allow-Origin': '*',
        }
    },
    plugins: [
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        laravel({
            input: [
                'resources/assets/sass/app.scss',
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        i18n('resources/lang')
    ],
    css: {
        postcss: {
            plugins: [tailwindcss, autoprefixer],
        },
    },
    resolve: {
        alias: {
            '@': '/resources/js',
            'vue': 'vue/dist/vue.esm-bundler.js',
        },
    },
});
