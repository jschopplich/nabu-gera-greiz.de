/* global sr */

import SmoothScroll from 'smooth-scroll'
import './cookieconsent'
import './registerServiceWorker'

// Reveal elements on scroll

sr.reveal('[data-scrollreveal="scale"]', { scale: 0.85 })
sr.reveal('[data-scrollreveal="fromTopIn"]', { distance: '0.5em', origin: 'top' })
sr.reveal('[data-scrollreveal="fromRightIn"]', { distance: '0.5em', origin: 'right' })
sr.reveal('[data-scrollreveal="fromBottomIn"]', { distance: '0.5em', origin: 'bottom' })
sr.reveal('[data-scrollreveal="fromLeftIn"]', { distance: '0.5em', origin: 'left' })

// Navigation

// Check for click events on the navbar burger icon
var $navbarTrigger = Array.from(document.querySelectorAll('.navbar-burger')).concat(Array.from(document.querySelectorAll('[data-navbar-toggle]')))
$navbarTrigger.forEach(function (element) {
  element.addEventListener('click', function () {
    // Toggle the `is-active` class on both the `navbar-burger` and the `navbar-menu`
    document.querySelector('.navbar-burger').classList.toggle('is-active')
    document.querySelector('.navbar-menu').classList.toggle('is-active')
  })
})

// Initialize smooth scrolling experience

// eslint-disable-next-line no-unused-vars
var scroll = new SmoothScroll('[data-smoothscroll]', {
  speed: 1250
})

// Modals

var $modalTrigger = Array.from(document.querySelectorAll('[data-open-modal]')).concat(Array.from(document.querySelectorAll('[data-close-modal]')))
$modalTrigger.forEach(function (element) {
  element.addEventListener('click', function (event) {
    var modalId = event.currentTarget.dataset.modalId
    document.querySelector(modalId).classList.toggle('is-active')
    document.documentElement.classList.toggle('is-clipped')
  })
})

// Carousels using Flickity

const Flickity = require('flickity')

window.addEventListener('load', function () {
  const $carouselImages = Array.from(document.querySelectorAll('.carousel figure'))
  $carouselImages.forEach(function (element) {
    element.classList.add('carousel-cell')
  })

  const $carousels = Array.from(document.querySelectorAll('.carousel'))
  $carousels.forEach(function (element) {
    // eslint-disable-next-line no-unused-vars
    const flkty = new Flickity(element, {
      cellAlign: 'center',
      contain: true,
      wrapAround: true,
      autoPlay: 3600
    })
  })
})