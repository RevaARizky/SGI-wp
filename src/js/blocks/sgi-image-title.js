import gsap from "gsap"

(() => {

    document.addEventListener("DOMContentLoaded", () => {

        const mains = document.querySelectorAll('.block-image-title')
        if(!mains.length) return false

        mains.forEach(main => {

            main.querySelectorAll('.has-desc').forEach(el => {
                el.anims = []

                const $each = (el, cb) => {
                    el.forEach(cb)
                }

                const playAnim = () => {
                    $each(el.anims, (i) => {i.play()})
                }

                const reverseAnim = () => {
                    $each(el.anims, (i) => {i.reverse()})
                }

                el.anims[0] = gsap.timeline({paused: true})
                el.anims[0].fromTo(el.querySelector('.description-wrapper'), {
                    bottom: '-100%',
                    ease: 'power3.out'
                }, {
                    bottom: '3rem',
                    ease: 'power3.out',
                    duration: .4,
                },0)

                el.anims[1] = gsap.timeline({paused: true})
                el.anims[1].fromTo(el.querySelector('.overlay-bg'), {
                    autoAlpha: 0,
                    ease: 'power3.out'
                }, {
                    autoAlpha: 1,
                    ease: 'power3.out',
                    duration: .4
                }, 0)

                el.querySelector('.image-wrapper').addEventListener('mouseenter', () => {
                    playAnim()
                })
                el.querySelector('.image-wrapper').addEventListener('mouseleave', () => {
                    reverseAnim()
                })

                
            })

        })

    })

})()