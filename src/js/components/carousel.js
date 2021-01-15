export default class {
  constructor () {
    const elements = [...document.querySelectorAll('.nabu-carousel')]
    if (elements.length !== 0) {
      this.init(elements)
    }
  }

  async init (elements) {
    const { default: Flickity } = await import('flickity')

    for (const figure of document.querySelectorAll('.nabu-carousel figure')) {
      figure.classList.add('nabu-carousel-cell')
    }

    for (const carousel of elements) {
      // eslint-disable-next-line no-unused-vars
      const flickity = new Flickity(carousel, {
        cellAlign: 'center',
        contain: true,
        wrapAround: true,
        autoPlay: 3600
      })
    }
  }
}
