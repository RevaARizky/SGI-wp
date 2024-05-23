import gsap from "gsap"
(() => {

    document.addEventListener("DOMContentLoaded", () => {

        const main = document.querySelector('.block-gallery-v2')

        if(!main) return false

        let videos = main.querySelectorAll('.media-wrapper.video')

        const generateAnim = (el, from, to) => {
            var res = gsap.timeline({paused: true})

            res.fromTo(el, from, to)
            return res
        }

        const playAnim = (anim) => {
            anim.forEach(e => {
                e.play()
            })
        }
        const reverseAnim = (anim) => {
            anim.forEach(e => {
                e.reverse()
            })
        }

        videos.forEach(el => {
            el.anim = []
            el.anim['hover'] = []
            el.anim['hover'][0] = generateAnim(el.querySelector('.icon-volume'), {
                bottom: '0rem',
                autoAlpha: 0,
                duration: .2,
            }, {
                bottom: '2rem',
                autoAlpha: 1,
                duration: .2
            })

            el.addEventListener('mouseover', () => {
                playAnim(el.anim['hover'])
            })
            
            el.addEventListener('mouseleave', () => {
                reverseAnim(el.anim['hover'])
            })

            el.addEventListener('click', () => {
                if(el.querySelector('video').muted) {
                    el.querySelector('.volume-on').style.display = 'block'
                    el.querySelector('.volume-off').style.display = 'none'
                }
                if(!el.querySelector('video').muted) {
                    el.querySelector('.volume-on').style.display = 'none'
                    el.querySelector('.volume-off').style.display = 'block'
                }
                el.querySelector('video').muted = !el.querySelector('video').muted
            })
            
        })

    })

})()