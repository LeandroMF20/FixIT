import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import { resolve } from 'path'

export default defineConfig({
    plugins: [vue()],
    publicDir: false,
    build: {
        outDir: 'public/build',
        emptyOutDir: true,
        rollupOptions: {
            input: {
                equipamentos: resolve(import.meta.dirname, 'resources/js/pages/equipamentos.js'),
            },
            output: {
                entryFileNames: 'js/[name].js',
                chunkFileNames: 'js/chunks/[name].js',
                assetFileNames: (assetInfo) => {
                    const name = assetInfo.names?.[0] ?? assetInfo.name ?? ''
                    if (name.endsWith('.css')) return 'css/[name][extname]'
                    return 'assets/[name][extname]'
                },
            },
        },
    },
})