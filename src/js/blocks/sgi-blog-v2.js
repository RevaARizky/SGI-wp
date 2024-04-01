import gsap from "gsap"

(() => {

    document.addEventListener("DOMContentLoaded", () => {

        const main = document.querySelector('.block-blog-v2')
        if(!main) return false

        const els = {
            blogs: main.querySelectorAll('.item')
        }

        els.blogs.forEach(el => {
            el.anims = []

            const playAnim = () => {
                el.anims.forEach(i => {i.play()})
            }
            const reverseAnim = () => {
                el.anims.forEach(i => {i.reverse()})
            }

            // gsap.to(el, {translateX})

            // Bottom line anims
            el.anims[0] = gsap.timeline({paused: true})
            el.anims[0].fromTo(el.querySelector('.line-bottom'), {
                width: 0,
                left: '50%',
                translateX: '-50%',
                ease: 'power3.Out'
            }, {
                width: '100%',
                left: 0,
                translateX: 0,
                duration: .4,
                ease: 'power3.Out'
            })

            // Btn hover anims

            el.anims[1] = gsap.timeline({paused: true})
            el.anims[1].fromTo(el.querySelector('.image-wrapper .btn'), {
                autoAlpha: 0,
                ease: 'power3.Out'
            }, {
                autoAlpha: 1,
                duration: .4,
                ease: 'power3.Out'
            }, 0)

            el.anims[2] = gsap.timeline({paused: true})
            el.anims[2].fromTo(el.querySelector('.image-wrapper .overlay-image'), {
                autoAlpha: 0,
                ease: 'power3.Out'
            }, {
                autoAlpha: 1,
                duration: .4,
                ease: 'power3.Out'
            }, 0)

            el.addEventListener('mouseenter', () => {
                playAnim()
            })
            el.addEventListener('mouseleave', () => {
                reverseAnim()
            })
        })

    })

})()