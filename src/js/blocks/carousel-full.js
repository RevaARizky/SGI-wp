import Swiper, { Autoplay } from 'swiper';

const target = document.querySelector('.js-carousel-full')
if (target) {
  new Swiper(target, {
    modules: [Autoplay],
    speed: 1500,
    loop: true,
    slidesPerView: 1,
    autoplay: true
  })
}
