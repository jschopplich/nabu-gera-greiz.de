const Bouncer = require('./vendor/bouncer')

// Bouncer standard options
var bouncerOptions = {
  fieldClass: 'is-danger', // Applied to fields with errors
  errorClass: 'help is-danger', // Applied to the error message for invalid fields
  messages: {
    missingValue: {
      checkbox: 'Dieses Feld ist erforderlich.',
      radio: 'Bitte wählen Sie einen Wert aus.',
      select: 'Bitte wählen Sie einen Wert aus.',
      'select-multiple': 'Bitte wählen Sie mindestens einen Wert aus.',
      default: 'Bitte füllen Sie dieses Feld aus.'
    },
    patternMismatch: {
      email: 'Bitte geben Sie eine gültige E-Mail-Adresse ein.',
      url: 'Bitte geben Sie eine URL ein.',
      number: 'Bitte geben Sie eine Nummer ein.',
      color: 'Bitte verwenden Sie das folgende Format: #rrggbb',
      date: 'Bitte verwenden Sie das Format YYYY-MM-DD.',
      time: 'Bitte verwenden Sie das 24-Stunden-Zeitformat. Z. B. 23:00.',
      month: 'Bitte verwenden Sie das Format YYYY-MM.',
      default: 'Bitte gleichen Sie an das gewünschte Format an.'
    },
    outOfRange: {
      over: 'Bitte wählen Sie einen Wert, der nicht größer als {max} ist.',
      under: 'Bitte wählen Sie einen Wert, der nicht kleiner als {min} ist.'
    },
    wrongLength: {
      over: 'Bitte kürzen Sie den Text auf maximal {maxLength} Zeichen. Sie verwenden derzeit {length} Zeichen.',
      under: 'Bitte verlängern Sie den Text auf {minLength} Zeichen oder mehr. Sie verwenden derzeit {length} Zeichen.'
    }
  },
  disableSubmit: true
}

const validator = new Bouncer('#newsletter-form', bouncerOptions)

// Detect successful form validation
document.addEventListener('bouncerFormValid', event => {
  const form = event.target
  const formData = new FormData(form)

  fetch(form.action, {
    method: 'POST',
    body: formData
  })
    .then(response => response.json())
    .catch(error => console.error('Error:', error))
    .then(response => {
      console.log('Success:', JSON.stringify(response))
      document.querySelector('.newsletter-notification').classList.remove('is-hidden')
    })
}, false)
