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
    "revision": "6ef9f5be3d9c7a515087c20af14f2087"
  }
])
}
