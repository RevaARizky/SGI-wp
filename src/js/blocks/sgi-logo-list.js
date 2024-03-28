import Swiper, {FreeMode} from "swiper"
import gsap from "gsap"
import ScrollTrigger from "gsap/ScrollTrigger"

(() => {

    document.addEventListener('DOMContentLoaded', () => {

        const main = document.querySelector('.block-logo-list')

        if(!main) return false

        const els = {
            slider: main.querySelector('.swiper')
        }

        new Swiper(els.slider, {
            modules: [FreeMode],
            slidesPerView: 5,
            allowTouchMove: false,
            freeMode: {
                enabled: true,
                minimumVelocity: 0,
                momentumBounce: 0,
            },
            spaceBetween: 70,
            loop: true,
        })

        gsap.registerPlugin(ScrollTrigger)
        ScrollTrigger.create({
            trigger: els.slider,
            start: 'top bottom',
            end: 'bottom top',
            onUpdate: (self) => {
                els.slider.swiper.setProgress(self.progress)
            }
        })

    })

})()