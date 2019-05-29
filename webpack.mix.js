/* eslint-env node */

const glob = require('glob')
const mix = require('laravel-mix')

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

mix.sourceMaps()
mix.disableNotifications()
mix.setPublicPath('assets')
mix.setResourceRoot('/assets/')

if (mix.inProduction()) {
  mix.version()
}
