import gsap from "gsap"
import Swiper from "swiper"

(() => {

    document.addEventListener('DOMContentLoaded', function() {
        let block = document.querySelector('.block-slider-fleet-v4')
        if(!block) return false
        
        
        const els = {
            slider: block.querySelector('.swiper'),
            nav: {
                next: block.querySelector('.next-btn'),
                prev: block.querySelector('.prev-btn')
            }
        }

        const calculateTitle = () => {
            gsap.to(block.querySelector('.calculate-target'), {
                left: `${block.querySelector('.calculate-width').clientWidth + 40}px`
            })
        }

        calculateTitle()
        window.addEventListener('resize', calculateTitle)

        new Swiper(els.slider, {
            slidesPerView: 1,
        })

        els.slider = els.slider.swiper

        els.nav.next.addEventListener('click', () => {
            els.slider.slideNext()
        })
        els.nav.prev.addEventListener('click', () => {
            els.slider.slidePrev()
        })


    })

})()