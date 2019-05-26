window.ScrollReveal = require('./vendor/scrollreveal').default

window.sr = ScrollReveal({ duration: 750 })

sr.reveal('[data-scrollreveal="scale"]', { scale: 0.85 })
sr.reveal('[data-scrollreveal="fromTopIn"]', { distance: '0.5em', origin: 'top' })
sr.reveal('[data-scrollreveal="fromRightIn"]', { distance: '0.5em', origin: 'right' })
sr.reveal('[data-scrollreveal="fromBottomIn"]', { distance: '0.5em', origin: 'bottom' })
sr.reveal('[data-scrollreveal="fromLeftIn"]', { distance: '0.5em', origin: 'left' })
