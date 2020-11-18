import Animere from 'animere'
import { useLazyload } from './hooks/useLazyload'

const lazyloading = useLazyload()
lazyloading.observe()

// eslint-disable-next-line no-unused-vars
const animere = new Animere()

// Handle navigation
const navbarBurger = document.querySelector('.navbar-burger')
const navbarMenu = document.querySelector('.navbar-menu')
navbarBurger.addEventListener('click', () => {
  navbarBurger.classList.toggle('is-active')
  navbarMenu.classList.toggle('is-active')
})

// Handle modals
for (const link of document.querySelectorAll('[data-open-modal], [data-close-modal]')) {
  link.addEventListener('click', ({ currentTarget }) => {
    const modalId = currentTarget.dataset.modalId
    document.querySelector(modalId).classList.toggle('is-active')
    document.documentElement.classList.toggle('is-clipped')
  })
}

// Initialize carousels
(async () => {
  const carousels = Array.from(document.querySelectorAll('.nabu-carousel'))
  if (carousels.length === 0) return

  const { default: Flickity } = await import('flickity')

  for (const figure of document.querySelectorAll('.nabu-carousel figure')) {
    figure.classList.add('nabu-carousel-cell')
  }

  for (const carousel of carousels) {
    // eslint-disable-next-line no-unused-vars
    const flickity = new Flickity(carousel, {
      cellAlign: 'center',
      contain: true,
      wrapAround: true,
      autoPlay: 3600
    })
  }
})()
