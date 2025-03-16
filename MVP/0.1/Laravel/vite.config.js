import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/index.css',
                'resources/css/show.css',
                'resources/js/index.js',
                'resources/js/create.js',
            ],
            refresh: true,
        }),
    ],
});
