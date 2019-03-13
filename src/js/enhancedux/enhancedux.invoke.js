window.addEventListener('load', function () {
  quicklink({
    ignores: [
      /\/api\/?/,
      //uri => uri.includes('.zip'),
      function (uri) { return uri.includes('.zip') },
      //(uri, elem) => elem.hasAttribute('noprefetch')
      function (uri, elem) { return elem.hasAttribute('noprefetch') },
      //uri => uri.includes('#')
      function (uri) { return uri.includes('#') }
    ]
  })
})
