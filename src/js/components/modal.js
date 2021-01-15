export default class {
  constructor () {
    const elements = [...document.querySelectorAll('[data-open-modal], [data-close-modal]')]
    if (elements.length !== 0) {
      this.init(elements)
    }
  }

  async init (elements) {
    for (const link of elements) {
      link.addEventListener('click', ({ currentTarget }) => {
        const modalId = currentTarget.dataset.modalId
        document.querySelector(modalId).classList.toggle('is-active')
        document.documentElement.classList.toggle('is-clipped')
      })
    }
  }
}
