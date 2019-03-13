var ready = function (fn) {
	// Sanity check
	if (typeof fn !== 'function') return
	// If document is already loaded, run method
	if (document.readyState === 'interactive' || document.readyState === 'complete') {
		return fn()
	}
	// Otherwise, wait until document is loaded
	document.addEventListener('DOMContentLoaded', fn, false)
}

ready(function () {

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
  var scroll = new SmoothScroll('[data-smoothscroll]', {
    speed: 1250
  })


  // Toggle modals
  var $modalTrigger = Array.from(document.querySelectorAll('[data-open-modal]')).concat(Array.from(document.querySelectorAll('[data-close-modal]')))
  $modalTrigger.forEach(function (element) {
    element.addEventListener('click', function (event) {
      var modalId = event.currentTarget.dataset.modalId
      document.querySelector(modalId).classList.toggle('is-active')
      document.documentElement.classList.toggle('is-clipped')
    })
  })


  // Newsletter

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

  var bouncer = new Bouncer('#newsletter-form', bouncerOptions)

  // Detect a successful form validation
  document.addEventListener('bouncerFormValid', function (event) {
    var form = event.target
    var request = new XMLHttpRequest()
    request.onload = function (event) {
      // FIXME: Kirby returns status code 404
      document.querySelector('.newsletter-notification').classList.remove('is-hidden')
      /*
      if (event.target.status >= 200 && event.target.status < 300) {
        document.querySelector('.newsletter-notification').classList.remove('is-hidden')
      } else {
        console.log('The request failed with: ' + event.target.response)
      }
      */
    }
    request.open('POST', form.action)
    request.send(new FormData(form))
  }, false)

})
