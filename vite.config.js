import { defineConfig, loadEnv } from 'vite'
import tailwindcss from '@tailwindcss/vite'
import { globSync } from 'glob'

const pages = globSync('src/pages/**/index.js').reduce((acc, path) => {
  if (path === 'src/pages/index.js') {
    acc['index'] = path
  } else {
    const name = path.match(/src\/pages\/(.+)\/index\.js$/)[1]
    acc[name] = path
  }
  return acc
}, {})

const phpWatchPlugin = {
  name: 'php-watch',
  handleHotUpdate({ file, server }) {
    if (file.endsWith('.php')) {
      server.ws.send({
        type: 'full-reload',
        path: '*'
      })
      return []
    }
  }
}

export default defineConfig(({ mode }) => {
  const env = loadEnv(mode, process.cwd(), '')
  const isProd = mode === 'production'
  const vitePort = parseInt(env.VITE_PORT, 10) || 5173
  const phpPort = parseInt(env.PORT, 10) || 8000

  return {
    plugins: [
      tailwindcss(),
      phpWatchPlugin,
    ],

    css: {
      lightningcss: {},
    },

    build: {
      minify: 'terser',
      terserOptions: {
        compress: {
          drop_console: isProd,
          drop_debugger: isProd,
          pure_funcs: isProd ? ['console.log', 'console.debug'] : [],
          passes: 3,
          unsafe: true, // Safe for most cases, enables additional optimizations
        },
        format: {
          comments: false,
        },
      },
      cssMinify: 'lightningcss',
      cssCodeSplit: true,
      target: 'es2020',
      outDir: 'build',
      emptyOutDir: true,
      manifest: true,
      publicDir: false,
      chunkSizeWarningLimit: 500, // Warn on chunks over 500KB
      modulePreload: {
        polyfill: false,
      },
      rollupOptions: {
        input: {
          app: 'src/app.js',
          ...pages,
        },
        output: {
          entryFileNames: 'assets/js/[name]-[hash].js',
          chunkFileNames: 'assets/js/[name]-[hash].js',
          assetFileNames: 'assets/css/[name]-[hash][extname]',
          manualChunks(id) {
            if (id.includes('node_modules')) {
              if (id.includes('basecoat-css')) return 'vendor-ui';
              return 'vendor';
            }
          },
        },
        treeshake: {
          moduleSideEffects: (id) => id.includes('basecoat-css') || id.includes('theme-command.js'),
          propertyReadSideEffects: false,
          tryCatchDeoptimization: false,
          unknownGlobalSideEffects: false,
        },
      },
    },

    server: {
      port: vitePort,
      proxy: {
        '/': {
          target: `http://localhost:${phpPort}`,
          changeOrigin: true,
          bypass: (req) => {
            const url = req.url.split('?')[0]
            if (
              req.url.startsWith('/@vite') ||
              req.url.startsWith('/node_modules/') ||
              /^\/src\/.*\.(js|mjs|css|svg|png|jpg|gif|woff2?|ttf|eot)$/.test(url)
            ) {
              return req.url
            }
          },
        },
      },
    },
  }
})
