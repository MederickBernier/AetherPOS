import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'temp_build',  // Temporary build directory
        rollupOptions: {
            input: {
                app: 'resources/js/app.js'  // Explicitly define the JS entry point
            },
            output: {
                entryFileNames: `js/[name].js`,
                chunkFileNames: `js/[name].js`,
                assetFileNames: `css/[name].[ext]`
            }
        },
    },
    server: {
        proxy: {
            '/': 'http://localhost:8000',
        }
    }
});
