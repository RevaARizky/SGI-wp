import $ from 'jquery'
import SectionParallax from '@/section-parallax'
import '@/blocks/carousel-text'
import '@/blocks/instagram'
import '@/blocks/room-list'
import '@/blocks/image-text'
import '@/blocks/carousel'
import '@/blocks/carousel-full'
import '@/blocks/testimonials'
import '@/blocks/sgi-home'
import '@/blocks/sgi-slider-unit'
import '@/blocks/sgi-our-fleet'
import '@/blocks/sgi-image-overlay'
import '@/blocks/sgi-about-team'
import '@/blocks/sgi-slider-fleet'
import '@/blocks/sgi-gallery'
import '@/sgi-anim'
import '@/sgi-index'
import Menu from '@/menu'

(function ($) {
  new Menu()
  new SectionParallax()
})($)
