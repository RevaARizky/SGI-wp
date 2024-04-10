import Swiper, {EffectFade} from "swiper"

(() => {

    document.addEventListener('DOMContentLoaded', function() {
        let block = document.querySelector('.block-slider-fleet-v2')
        if(!block) {
            return false
        }
        
        let swiperEl = {
            image: block.querySelector('.image-slider-wrapper'),
            content: block.querySelector('.content-slider-wrapper'),
            gallery: block.querySelector('.gallery-slider-wrapper'),
        }

        let swiperNav = {
            next: block.querySelector('.button-nav-wrapper .next-btn'),
            prev: block.querySelector('.button-nav-wrapper .prev-btn')
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