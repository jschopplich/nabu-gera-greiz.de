importScripts('https://storage.googleapis.com/workbox-cdn/releases/4.3.1/workbox-sw.js')

if (workbox) {
  workbox.precaching.precacheAndRoute([
  {
    "url": "assets/build/main.min.css",
    "revision": "a7c29995a0b19fb820ab2b66ee8305e1"
  },
  {
    "url": "assets/build/main.min.js",
    "revision": "e27b8af5294b04f883fd4590511f2858"
  },
  {
    "url": "assets/build/scrollreveal.min.js",
    "revision": "a6d4b992543df9a5df7c17f28a360620"
  }
])
}
