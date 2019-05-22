/*
;(function () {

  // Medium-like zoomable images
  function _toConsumableArray (arr) {
    if (Array.isArray(arr)) {
      for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) {
        arr2[i] = arr[i]
      }
      return arr2
    } else {
      return Array.from(arr)
    }
  }
  var images = [].concat(_toConsumableArray(document.querySelectorAll('.image-box img')), _toConsumableArray(document.querySelectorAll('[data-zoomable]')))
  mediumZoom(images, {
    margin: window.matchMedia('(min-width: 1024px)').matches ? 48 : 0,
    background: 'rgba(255, 255, 255, 0.85)',
    scrollOffset: 48
  })

})()
*/


window.addEventListener('load', function () {

  // Touch, responsive carousels with Flickity
  $carouselImages = Array.from(document.querySelectorAll('.carousel figure'))
  $carouselImages.forEach(function (element) {
    element.classList.add('carousel-cell')
  })

  $carousels = Array.from(document.querySelectorAll('.carousel'))
  $carousels.forEach(function (element) {
    var flkty = new Flickity(element, {
      cellAlign: 'center',
      contain: true,
      wrapAround: true,
      autoPlay: 3600
    })
  })

})