import gsap from "gsap"

(() => {

    document.addEventListener("DOMContentLoaded", () => {
        const main = document.querySelector('.block-service-excellence')

        if(!main) return false

        const els = {
            items: []
        }

        main.querySelectorAll('.item').forEach((el, i) => {
            els.items.push({main: el, title: el.querySelector('.title-wrapper'), content: el.querySelector('.content-wrapper'), description: el.querySelector('.description-wrapper'), img: main.querySelector(`.image-target[data-index="${i}"]`), arrow: el.querySelector('.arrow-wrapper')})
        })
        console.log(els)


        els.items.forEach((el, i) => {

            el.anims = []
            var animDuration = .4
            const playAnim = (target = el) => {
                target.anims.forEach(i => {
                    i.play()
                })
            }
            const reverseAnim = (target = el) => {
                target.anims.forEach(i => {
                    i.reverse()
                })
            }

            // Description Height
            el.anims[0] = gsap.timeline({paused: true})
            el.anims[0].from(el.description, {
                height: 0,
            }, 0)
            el.anims[0].to(el.description, {
                height: 'auto',
                duration: animDuration
            }, 0)

            // Border Animation
            el.anims[1] = gsap.timeline({paused: true})
            el.anims[1].fromTo(el.main, {
                borderRightColor: '#D9D9D9'
            }, {borderRightColor: '#D75C00', duration: animDuration}, 0)

            // Image transition
            el.anims[2] = gsap.timeline({paused: true})
            el.anims[2].fromTo(el.img, {
                autoAlpha: 0,
            }, {
                autoAlpha: 1,
                duration: animDuration
            }, 0)

            // Arrow popup
            el.anims[3] = gsap.timeline({paused: true})
            el.anims[3].fromTo(el.arrow, {
                right: "-30px"
            }, {
                right: 0,
                duration: animDuration
            }, 0)

            if(!i) {
                el.main.classList.add('active')
                playAnim()
            } else {
                reverseAnim()
            }
            el.main.addEventListener('mouseenter', () => {
                if(el.main.classList.contains('active')) return false
                el.anims[1].play()
            })
            el.main.addEventListener('mouseleave', () => {
                if(el.main.classList.contains('active')) return false
                el.anims[1].reverse()
            })
            el.main.addEventListener('click', () => {
                if(el.main.classList.contains('active')) return false

                els.items.forEach(e => {
                    if(e.main.classList.contains('active')){
                        reverseAnim(e)
                        e.main.classList.remove('active')
                    }
                })
                playAnim()
                el.main.classList.add('active')
            })
        })

    })

})()