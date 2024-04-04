import Swiper from "swiper"
import gsap from "gsap"
(() => {

    document.addEventListener("DOMContentLoaded", () => {
        const main = document.querySelector('.block-scope-v3')

        if(!main) return false

        const els = {
            slider: main.querySelector('.swiper'),
            nav: {
                next: main.querySelector('.custom-nav .next-btn'),
                prev: main.querySelector('.custom-nav .prev-btn'),
            }
        }

        new Swiper(els.slider, {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            breakpoints: {
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30
                }
            }
        })

        els.nav.next.addEventListener('click', () => {
            els.slider.swiper.slideNext()
        })
        els.nav.prev.addEventListener('click', () => {
            els.slider.swiper.slidePrev()
        })

    })

})()