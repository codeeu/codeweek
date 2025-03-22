import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import i18n from 'laravel-vue-i18n/vite';
import tailwindcss from 'tailwindcss';
import autoprefixer from 'autoprefixer';
import fs from 'fs';
import path from 'path';

export default defineConfig(({ mode }) => {
    const env = loadEnv(mode, process.cwd());
    const isLocal = mode === 'development';
    const domain = env.APP_URL || 'localhost';

    const certPath = path.resolve(process.env.HOME, `.config/valet/Certificates/${domain}.crt`);
    const keyPath = path.resolve(process.env.HOME, `.config/valet/Certificates/${domain}.key`);

    const config = {
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
                vue: 'vue/dist/vue.esm-bundler.js',
            },
        },
        define: {
            global: 'window',
        },
        esbuild: {
            jsxFactory: 'h',
            jsxFragment: 'Fragment',
        },
    };

    if (isLocal && fs.existsSync(certPath) && fs.existsSync(keyPath)) {
        config.server = {
            host: domain,
            port: 5174,
            https: {
                key: fs.readFileSync(keyPath),
                cert: fs.readFileSync(certPath),
            },
            hmr: {
                host: domain,
                protocol: 'wss',
            },
            cors: true,
        };
    } else if (isLocal) {
        config.server = {
            host: domain,
            port: 5174,
            cors: true,
        };
    }

    return config;
});
