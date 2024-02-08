import { EffectFade } from "swiper"
import Swiper from "swiper"

const initSlider = () => {
    const targetFleet = document.querySelector('.block-our-fleet .fleet-slider .swiper-container')
    if(!targetFleet) {
        return false
    }
    new Swiper(targetFleet, {
        // allowSlideNext: false,
        // allowSlidePrev: false,
        // slidesPerView: "auto",
        modules: [EffectFade],
        allowTouchMove: false,
        effect: "fade",
        spaceBetween: 30,
        fadeEffect: {
            crossFade: true
        },
        // slidesPerView: 1,
    })
    const fleetSlider = targetFleet.swiper

    document.querySelectorAll('.block-our-fleet .fleet-options .item').forEach(el => {
        el.addEventListener('click', e => {
            document.querySelectorAll('.block-our-fleet .fleet-options .item').forEach(elDis => elDis.classList.remove('active'))
            el.classList.add('active')
            fleetSlider.slideTo(parseInt(el.dataset.index) - 1)
        })
    })
}

document.addEventListener('DOMContentLoaded', initSlider)
