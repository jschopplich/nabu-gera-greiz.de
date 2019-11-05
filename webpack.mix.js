/* eslint-env node */

const glob = require('glob')
const mix = require('laravel-mix')

mix.options({
  autoprefixer: false,
  processCssUrls: false
})

mix.js('src/js/site.js', 'js')
mix.js('src/js/scrollreveal.js', 'js')

// Search for template-specific JavaScript files
const templateJS = glob.sync('./src/js/templates/*.js')
for (let i = 0, l = templateJS.length; i < l; i++) {
  mix.js(templateJS[i], 'js/templates')
}

mix.sass('src/scss/site.sass', 'css')

// Search for template-specific CSS files
// const templateCSS = glob.sync('./src/scss/templates/*.scss')
// for (let i = 0, l = templateCSS.length; i < l; i++) {
//   mix.sass(templateCSS[i], 'css/templates')
// }

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
