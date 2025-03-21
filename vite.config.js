import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/user/css/custom.css', 'resources/user/css/main.css', 'resources/user/css/carouselMeetWithExperts.css'],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build', // Ensure built assets go to `public/build`
    }
});
