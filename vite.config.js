import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/jquery-3.6.4.min.js',
                'resources/css/app.css',
                'resources/css/style.css',
                'resources/scss/app.scss',
                'resources/js/app.js',
                'resources/js/anim.js',
                'resources/js/hmain.js',
                'resources/js/scrollMain.js',
                'resources/js/form.js',
                'resources/js/popup.js',],
            refresh: true,
        }),
    ],

});
