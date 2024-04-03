import Swiper, {EffectFade} from "swiper"

(() => {

    document.addEventListener('DOMContentLoaded', function() {
        let block = document.querySelector('.block-slider-fleet')
        if(!block) {
            return false
        }
        
        let swiperEl = {
            image: document.querySelector('.image-slider-wrapper'),
            content: document.querySelector('.content-slider-wrapper'),
            gallery: document.querySelector('.gallery-slider-wrapper'),
        }

        let swiperNav = {
            next: document.querySelector('.button-nav-wrapper .next-btn'),
            prev: document.querySelector('.button-nav-wrapper .prev-btn')
        }

        new Swiper(swiperEl.image, {slidesPerView: 1, spaceBetween: 40})
        new Swiper(swiperEl.content, {slidesPerView: 1, allowTouchMove: false, modules: [EffectFade], effect: "fade", fadeEffect: {crossFade: true}, autoHeight: true})
        new Swiper(swiperEl.gallery, {slidesPerView: 1, allowTouchMove: false, modules: [EffectFade], effect: "fade", fadeEffect: {crossFade: true}, autoHeight: true})

        swiperNav.next.addEventListener('click', () => {
            for(const key in swiperEl) {
                swiperEl[key].swiper.slideNext()
            }
        })
        swiperNav.prev.addEventListener('click', () => {
            for(const key in swiperEl) {
                swiperEl[key].swiper.slidePrev()
            }
        })

        swiperEl.image.swiper.on('slideChange', e => {
            console.log(e)
            for(const key in swiperEl) {
                if(key == 'image') {
                    return false
                }
                swiperEl[key].swiper.slideTo(e.activeIndex)
            }
        })

    })

})()