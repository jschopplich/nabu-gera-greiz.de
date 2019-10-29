module.exports = {
  globDirectory: './assets/',
  globPatterns: [
    'build/*.{css,js}',
    // 'js/templates/*.js',
    'fonts/SourceSerifPro/*.{css,woff2}'
  ],
  runtimeCaching: [{
    urlPattern: /\.(?:png|jpg|svg|webp)$/,
    handler: 'CacheFirst',
    options: {
      cacheName: 'images-cache',
      expiration: {
        maxEntries: 50,
        maxAgeSeconds: 30 * 24 * 60 * 60, // 30 Days
        purgeOnQuotaError: true
      }
    }
  }],
  swDest: 'assets/service-worker.js',
  skipWaiting: true,
  clientsClaim: true
}
