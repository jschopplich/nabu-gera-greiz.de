import Animere from 'animere'
import { useLazyload } from './hooks/useLazyload'

const lazyloading = useLazyload()
lazyloading.observe()

// eslint-disable-next-line no-unused-vars
const animere = new Animere()

// Handle navigation
for (const link of [
  ...document.querySelectorAll('.navbar-burger'),
  ...document.querySelectorAll('.navbar-link')
]) {
  link.addEventListener('click', () => {
    document.querySelector('.navbar-burger').classList.toggle('is-active')
    document.querySelector('.navbar-menu').classList.toggle('is-active')
  })
}

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
