import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/auth/sign-in.js',
                'resources/js/auth/sign-up.js',
                'resources/js/page/lecture/table.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
