import $ from 'jquery'

class Menu {
  constructor() {
    this.$body = $('body')
    const trigger = document.querySelector('.js-menu-trigger')
    const panel = document.querySelector('.js-menu-panel')
    const close = document.querySelector('.js-menu-close')

    if (trigger && panel && close) {
      trigger.addEventListener('click', () => {
        panel.classList.add('active')
        close.classList.add('active')
        this.$body.addClass('is--menu-open')
      })

      close.addEventListener('click', () => {
        panel.classList.remove('active')
        close.classList.remove('active')
        this.$body.removeClass('is--menu-open')
      })
    }
  }
}

export default Menu