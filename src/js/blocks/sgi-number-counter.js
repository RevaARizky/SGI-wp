import gsap from "gsap"
import ScrollTrigger from "gsap/ScrollTrigger"

(() => {

    document.addEventListener("DOMContentLoaded", () => {
        const mainel = document.querySelector('.block-number-counter')
        if(!mainel) {
            return false
        }
        gsap.registerPlugin(ScrollTrigger)
        const number = gsap.utils.toArray(mainel.querySelectorAll('.counter-anim'))

        number.forEach(el => {
            console.log(parseInt(el.innerHTML))
        })
        number.forEach(el => {
            if(parseInt(el.innerHTML)) {
                gsap.from(el, {
                    scrollTrigger: {
                        trigger: mainel
                    },
                    textContent: 0,
                    duration: Math.random() * 3.5,
                    ease: 'power1.easeIn',
                    snap: { textContent: 1 },
                });
            }
        })
    })

})()