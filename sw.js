importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js')

if (workbox) {
  workbox.precaching.precacheAndRoute([
  {
    "url": "assets/build/main.css",
    "revision": "3382fa2f0784c6815a2401108420db39"
  },
  {
    "url": "assets/build/main.js",
    "revision": "cf4bb1c708a19113f0652276f8e548cd"
  },
  {
    "url": "assets/build/scrollreveal.js",
    "revision": "42bcf60ee9eb08a84eb011dc87fa0027"
  }
])
}
