import $ from 'jquery'

class WindowProxy {
  constructor() {
    this.$window = $(window)
    this.$body = $('body')
    this.scrollListeners = []
    this.scrollTop = 0;
    this.lastScrollTop = 0;

    const scrollListener = () => {
      this.scrollTop = this.$window.scrollTop()

      if (this.scrollTop > this.lastScrollTop) {
        // scrolling down
        this.$body.removeClass('is--scrolled-up')
        this.$body.addClass('is--scrolled-down')
      } else {
        // scrolling up
        this.$body.removeClass('is--scrolled-down')
        this.$body.addClass('is--scrolled-up')
      }

      /* body effect */
      this.$body.toggleClass('is--scrolled', this.scrollTop > 0)

      /* other elements effect */
      this.scrollListeners.forEach(listener => listener(this.scrollTop))

      this.lastScrollTop = this.scrollTop
    }

    this.$window.on('scroll', scrollListener)
    scrollListener()
  }

  addScrollListener(callback) {
    if (this.scrollListeners.includes(callback)) return
    this.scrollListeners.push(callback)
  }
}

export default new WindowProxy()
