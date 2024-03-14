import gsap from "gsap"
import ScrollTrigger from "gsap/ScrollTrigger"
import CSSPlugin from "gsap/CSSPlugin"
import CSSRulePlugin from "gsap/CSSRulePlugin"


(() => {

    document.addEventListener('DOMContentLoaded', () => {

        document.querySelectorAll('.block-image-overlay .image-wrapper').forEach((el, i) => {
            el.addEventListener('click', function() {
                console.log('clicked')
                if(document.querySelector(`.block-image-overlay .overlay-item[data-overlay="${el.dataset.target}"]`).classList.contains('active')) {
                    document.querySelector(`.block-image-overlay .overlay-item[data-overlay="${el.dataset.target}"]`).classList.remove('active')
                    return                    
                }
                document.querySelector(`.block-image-overlay .overlay-item[data-overlay="${el.dataset.target}"]`).classList.add('active')
            })
        })

        const imgArr = gsap.utils.toArray('.block-image-overlay .image-wrapper')
        imgArr.forEach(el => {
            let img = el.querySelector('img')
            if(el.classList.contains('scroll-reveal-image')) {
                el.scroll = gsap.timeline({
                    scrollTrigger: {
                        trigger: el,
                        start: "top center",
                        ease: "power3.in"
                    }
                })
                el.scroll.to(el, {
                    '--topScrollTrigger': '100%',
                    duration: .4,
                })
            }
            let tl = gsap.timeline({
                paused: true,
            })
            img.anim = tl.fromTo(img, {
                scale: 1,
            }, {
                scale: 1.5
            })
            el.addEventListener('mouseenter', (e) => {
                img.anim.duration(40)
                img.anim.play()
            })
            el.addEventListener('mouseleave', () => {
                img.anim.duration(0)
                img.anim.reverse()
            })
        })

    })

})()