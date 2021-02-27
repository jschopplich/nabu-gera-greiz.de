import { useLazyload } from './hooks/useLazyload'
import Animere from 'animere'
import Modals from './components/modal'
import Carousels from './components/carousel'

// Lazily load images
const observer = useLazyload()
observer.observe()

// eslint-disable-next-line no-unused-vars
const animere = new Animere()

// Handle navigation
const navbarBurger = document.querySelector('.navbar-burger')
const navbarMenu = document.querySelector('.navbar-menu')
navbarBurger.addEventListener('click', () => {
  navbarBurger.classList.toggle('is-active')
  navbarMenu.classList.toggle('is-active')
})

// Initialize components
new Modals()
new Carousels()
