import {gsap} from "gsap"

(() => {


    const initAnim = () => {

        document.querySelectorAll('.block-home .unit-wrapper').forEach(function(el) {
            // this.stateAnim = false

            var tl = gsap.timeline({
                paused: true,
            })
            tl.from(el.querySelector('.anim-hover-line'), {
                top: '0',
                bottom: "100%",
                width: '4px',
                translateX: '0%',
                duration: 0.1,
                ease: "power3.out",
            })
            tl.to(el.querySelector('.anim-hover-line'), {
                bottom: '0',
                width: '4px',
                translateX: '0%',
                duration: 0.3,
                ease: "power3.out",
            })
            tl.to(el.querySelector('.anim-hover-line'), {
                bottom: "0",
                width: '100%',
                translateX: '0%',
                duration: 0.6,
                ease: "power3.out",
            })
            tl.call(() => {
                // if(this.stateAnim = 'forward') {
                //     el.classList.add('active')
                // } 
                // if(this.stateAnim = 'reverse') {
                //     el.classList.remove('active')
                // }
                el.classList.toggle('active')
            })
            tl.to(el.querySelector('.anim-hover-line'), {
                bottom: "0",
                width: '100%',
                translateX: '110%',
                ease: "power3.out",
                duration: 0.5,
            })

            

            el.addEventListener('mouseover', () => {
                if(tl) {
                    // this.stateAnim = 'forward' 
                    tl.play() 
                }
            })
            el.addEventListener('mouseleave', () => {
                if(tl) {
                    // this.stateAnim = 'reverse'
                    tl.reverse()
                }
            })
        })
    }

    document.addEventListener('DOMContentLoaded', function() {
        var delayAnim = 200
        document.querySelectorAll('.block-home .unit-wrapper').forEach(el => {
            setTimeout(() => {
                var tl = gsap.timeline()
                tl.to(el.querySelector('.anim-init-line'), {
                    height: '0',
                    duration: 0.1,
                    ease: "power3.out",
                })
                tl.to(el.querySelector('.anim-init-line'), {
                    height: '100%',
                    duration: 0.3,
                    ease: "power3.out",
                })
                tl.to(el.querySelector('.anim-init-line'), {
                    width: '100%',
                    duration: 0.6,
                    ease: "power3.out",
                })
                tl.to(el.querySelector('.anim-init-line'), {
                    translateX: '110%',
                    ease: "power3.out",
                    duration: 0.5,
                })
                tl.call(() => {
                    el.querySelector('.logo-wrapper').classList.add('loaded')
                    document.querySelectorAll('.block-home .nav-mobile .nav-wrapper').forEach((el, i) => {
                        var tl = gsap.timeline()
                        tl.to(el, {
                            delay: (i + 1) * 0.25,
                            duration: 0.15,
                            translateY: 0,
                            opacity: 1,
                        })
                        tl.call(() => {
                            el.classList.add('loaded')
                            if(i == 0) {
                                setTimeout(() => {
                                    el.classList.add('active')
                                }, 300)
                            }
                        })
                    })
                })
            }, delayAnim += 200)
        })
        initAnim()
        document.querySelectorAll('.block-home a.delay-link').forEach(el => {
            el.addEventListener('click', function(e) {
                console.log(el.href)
                if(el.href.endsWith('#')) {
                    return
                }
                var delayLink = 0
                var link = el.href
                e.preventDefault()
                document.querySelectorAll('.block-home .unit-wrapper').forEach(el => {
                    setTimeout(() => {
                        var tl = gsap.timeline()
                        tl.to(el.querySelector('.anim-delay-line'), {
                            height: '100%',
                            duration: 0.3,
                            ease: "power3.out",
                        })
                        tl.to(el.querySelector('.anim-delay-line'), {
                            width: '100%',
                            duration: 0.6,
                            ease: "power3.out",
                        })
                        tl.call(() => {
                            window.location.href = link
                        })
                    }, delayLink += 100)
                })
            })
        })

        document.querySelectorAll('.block-home .nav-wrapper').forEach(el => {
            el.addEventListener('click', function() {
                document.querySelectorAll('.block-home .nav-wrapper').forEach(el => {el.classList.remove('active')})
                document.querySelectorAll('.block-home .unit-wrapper').forEach(el => {el.classList.remove('mobile-active')})
                document.querySelector(`.block-home .unit-wrapper[data-index='${el.dataset.target}']`).classList.add('mobile-active')
                el.classList.add('active')
            })
        })
    })

})()