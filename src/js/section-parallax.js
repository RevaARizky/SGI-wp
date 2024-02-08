import $ from 'jquery'
import windowProxy from '@/window-proxy'

class SectionParallax {
  constructor() {
    this.isMobile = false
    this.isNotResettedYet = true

    this.setupSection('hero', 0.4)
    this.setupSection('image', 0.2)
    this.setupSection('carousel-text', -0.5)
    this.setupSection('image-overflow', -0.3)

    $(window).on('resize', () => {
      this.onResize()
    })

    this.onResize()
  }

  onResize() {
    if ($(window).width() < 1024) {
      this.isNotResettedYet = true
      this.isMobile = true
    } else {
      this.isMobile = false
    }
  }

  setupSection(blockFilename, mod) {
    const $container = $(`.block-${blockFilename}`)
    const $target = $(`.js-${blockFilename}-parallax-target`)

    if (!$container || ($container && $container.length === 0)) return
    if (!$target || ($target && $target.length === 0)) return

    const containerOffsetTop = $container.offset().top
    const containerHeight = $container.height()
    const threshold = containerOffsetTop + containerHeight

    if (!threshold || typeof threshold !== 'number') return

    windowProxy.addScrollListener((scrollTop) => {
      if (scrollTop > threshold) return

      if (
        this.isMobile
        /* block filtering */
        && (
          blockFilename === 'carousel-text'
          || blockFilename === 'image-overflow'
        )
      ) {
        if (this.isNotResettedYet) {
          $target.css('transform', `translateY(0)`)
          this.isNotResettedYet = false
        }
      } else {
        $target.css('transform', `translateY(${(scrollTop - containerOffsetTop) * mod}px)`)
      }
    })
  }
}

export default SectionParallax
