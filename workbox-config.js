module.exports = {
  "globDirectory": ".",
  "globPatterns": [
    "assets/build/*.min.{css,js}"
  ],
  "globIgnores": ['assets/**/*.prefetch.*'],
  "swDest": "sw.js",
  "swSrc": "src/sw.js"
}
