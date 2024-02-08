import Swiper from 'swiper';

const target = document.querySelector('.js-carousel')
if (target) {
  const swiper = new Swiper(target, {
    loop: true,
    slidesPerView: 'auto',
    centeredSlides: true,
    spaceBetween: 30,
    slideToClickedSlide: true
  })

  swiper.slideNext()
}
