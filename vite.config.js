import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        // The outDir should be set to your public directory
        outDir: 'public/build',
    },
    server: {
        https: true, // Asegúrate de habilitar HTTPS si estás en desarrollo.
    },
u
});
