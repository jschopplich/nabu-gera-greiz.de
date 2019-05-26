window.addEventListener('load', () => {

  window.cookieconsent.initialise({
    'palette': {
      'popup': {
        'background': '#ffffff',
        'text': '#363636'
      },
      'button': {
        'background': '#005dad',
        'text': '#ffffff'
      }
    },
    'content': {
      'message': 'Wir nutzen Cookies, um unsere Website fortlaufend verbessern. Wenn Sie die Website weiter nutzen, stimmen Sie dadurch der Verwendung von Cookies zu.',
      'dismiss': 'OK',
      'link': 'Datenschutzerklärung',
      'href': '/datenschutzerklaerung'
    }
  })

}, false)
