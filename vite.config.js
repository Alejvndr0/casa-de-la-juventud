// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        cors: true,
        hmr: {
            host: 'tu-subdominio.ngrok-free.app',
            protocol: 'wss',
        },
    },
});
