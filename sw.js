importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js')

if (workbox) {
  workbox.precaching.precacheAndRoute([
  {
    "url": "assets/build/main.css",
    "revision": "aa26b6fd283055d8c09865f53d01a802"
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
    "revision": "d3279d0d6d5977f31e40acfc49d1d60e"
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
