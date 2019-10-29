/* eslint-env node */

const glob = require('glob')
const mix = require('laravel-mix')
const { GenerateSW } = require('workbox-webpack-plugin')
const { CleanWebpackPlugin } = require('clean-webpack-plugin')

mix.options({
  autoprefixer: false,
  processCssUrls: false
})

mix.js('resources/js/main.js', 'build')
mix.js('resources/js/scrollreveal.js', 'build')

/* Search for template-specific JavaScript files */
const templateJS = glob.sync('./resources/js/templates/*.js')
for (let i = 0, l = templateJS.length; i < l; i++) {
  mix.js(templateJS[i], 'js/templates')
}

mix.sass('resources/scss/main.sass', 'build')

/* Search for template-specific CSS files */
/*
const templateCSS = glob.sync('./resources/scss/templates/*.scss')
for (let i = 0, l = templateCSS.length; i < l; i++) {
  mix.sass(templateCSS[i], 'css/templates')
}
*/

// mix.sourceMaps()
mix.disableNotifications()
mix.setPublicPath('assets')
mix.setResourceRoot('/assets/')

if (!mix.inProduction()) {
  mix.webpackConfig({
    devtool: 'source-map'
  })
  .sourceMaps()
}

if (mix.inProduction()) {
  mix.version()
}

mix.webpackConfig({
  plugins: [
    new CleanWebpackPlugin({
      cleanStaleWebpackAssets: false,
      protectWebpackAssets: false,
      cleanOnceBeforeBuildPatterns: ['*.js', 'build/*']
    }),
    new GenerateSW({
      swDest: 'service-worker.js',
      clientsClaim: true,
      skipWaiting: true,
      cleanupOutdatedCaches: true,
      runtimeCaching: [{
        urlPattern: /fonts\/.*\.(?:css|woff2)$/,
        handler: 'CacheFirst',
        options: {
          cacheName: 'fonts'
        }
      }]
    })
  ]
})
