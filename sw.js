importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js')

if (workbox) {
  workbox.precaching.precacheAndRoute([
  {
    "url": "assets/build/main.css",
    "revision": "79d9bfd4a205971946500b9b31d21827"
  },
  {
    "url": "assets/build/main.js",
    "revision": "b3504d5c6637c5b44317bc76588b3459"
  },
  {
    "url": "assets/build/scrollreveal.js",
    "revision": "7b869e693f117a603a1f0faf7ce678c6"
  },
  {
    "url": "assets/fonts/SourceSerifPro/family.css",
    "revision": "4a574e85d740f62483ff625444de9094"
  },
  {
    "url": "assets/fonts/SourceSerifPro/SourceSerifPro-Bold.otf.woff2",
    "revision": "38b1876e0b8a15970908814054fb2ca6"
  },
  {
    "url": "assets/fonts/SourceSerifPro/SourceSerifPro-BoldIt.otf.woff2",
    "revision": "dfb9fa7417fec83777f48edb8f7ace46"
  },
  {
    "url": "assets/fonts/SourceSerifPro/SourceSerifPro-It.otf.woff2",
    "revision": "d929519a76ad94c546de74b8202623e8"
  },
  {
    "url": "assets/fonts/SourceSerifPro/SourceSerifPro-Regular.otf.woff2",
    "revision": "b809e521fcacd5df16511be15fc29cfc"
  }
])
}
