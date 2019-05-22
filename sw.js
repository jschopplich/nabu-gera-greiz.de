importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js')

if (workbox) {
  workbox.precaching.precacheAndRoute([
  {
    "url": "assets/build/main.min.css",
    "revision": "b644534c333c1a5579cecf2f32c2cbde"
  },
  {
    "url": "assets/build/main.min.js",
    "revision": "37c1cf75da425fdd692cc4d13b1af2d8"
  },
  {
    "url": "assets/build/scrollreveal.min.js",
    "revision": "a6d4b992543df9a5df7c17f28a360620"
  }
])
}
