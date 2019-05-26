importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js')

if (workbox) {
  workbox.precaching.precacheAndRoute([
  {
    "url": "assets/build/main.css",
    "revision": "3382fa2f0784c6815a2401108420db39"
  },
  {
    "url": "assets/build/main.js",
    "revision": "b3504d5c6637c5b44317bc76588b3459"
  },
  {
    "url": "assets/build/scrollreveal.js",
    "revision": "7b869e693f117a603a1f0faf7ce678c6"
  }
])
}
