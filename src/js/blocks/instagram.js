import Swiper, { Autoplay } from 'swiper';

const target = document.querySelector('.js-instagram-carousel')
if (target) {
  new Swiper(target, {
    modules: [Autoplay],
    loop: true,
    autoplay: true,
    centeredSlides: true,
    slidesPerView: "auto",
    spaceBetween: 20
  })
}
