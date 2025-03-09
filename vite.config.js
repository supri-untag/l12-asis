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
                'resources/assets/plugins/custom/fslightbox/fslightbox.bundle.js',
                'resources/assets/plugins/custom/typedjs/typedjs.bundle.js',
                'resources/assets/js/custom/landing.js',
                'resources/assets/js/custom/pages/pricing/general.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
