importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js')

if (workbox) {
  workbox.precaching.precacheAndRoute([
  {
    "url": "assets/build/main.css",
    "revision": "a6cf019037cf39cc8aea509d21df2e51"
  },
  {
    "url": "assets/build/main.js",
    "revision": "ebe16950685c6a0db0201a2a89f06996"
  },
  {
    "url": "assets/build/scrollreveal.js",
    "revision": "542204709d4d6162f115b76e86e9b0b4"
  },
  {
    "url": "assets/fonts/SourceSerifPro/family.css",
    "revision": "d1fcd45269400df65b645c2cd8e99844"
  },
  {
    "url": "assets/fonts/SourceSerifPro/SourceSerifPro-Bold.ttf.woff2",
    "revision": "be93b6dc83bb64cc0107c90b6b7b953f"
  },
  {
    "url": "assets/fonts/SourceSerifPro/SourceSerifPro-BoldIt.ttf.woff2",
    "revision": "0347030446e9545f1511449423dd03b6"
  },
  {
    "url": "assets/fonts/SourceSerifPro/SourceSerifPro-It.ttf.woff2",
    "revision": "22499dd65afb627820dc322050ad96c5"
  },
  {
    "url": "assets/fonts/SourceSerifPro/SourceSerifPro-Regular.ttf.woff2",
    "revision": "f57d4f93ac6d0aff061caa1d7e75e1a1"
  }
])
}
