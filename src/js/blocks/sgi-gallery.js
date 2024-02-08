import Swiper from "swiper"

(() => {

    document.addEventListener("DOMContentLoaded", () => {
        let block = document.querySelector('.block-gallery')
        if(!block) {
            return false
        }
        let sliderEl = block.querySelector('.gallery-slider-wrapper')
        let sliderNav = {
            prev: block.querySelector('.gallery-slider-nav .prev-btn'),
            next: block.querySelector('.gallery-slider-nav .next-btn')
        }
        new Swiper(sliderEl, {
            slidesPerView: 1,
            loop: true,
        })
        sliderNav.next.addEventListener('click', function() {
            sliderEl.swiper.slideNext()
        })
        sliderNav.prev.addEventListener('click', function() {
            sliderEl.swiper.slidePrev()
        })
    })

})()