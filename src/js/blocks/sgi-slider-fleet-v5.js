import gsap from "gsap"
import Swiper from "swiper"

(() => {

    document.addEventListener('DOMContentLoaded', function() {
        let block = document.querySelector('.block-slider-fleet-v5')
        if(!block) return false
        
        const generateAnim = (el, from, to) => {
        }


        const els = {
            slider: block.querySelector('.swiper'),
            sliderNav: {
                next: block.querySelector('.next-btn'),
                prev: block.querySelector('.prev-btn')
            },
            fleetParent: block.querySelectorAll('.fleet-parent'),
            nav: block.querySelectorAll('.navigation-bar .nav'),
            navTarget: block.querySelectorAll('.navigation-target'),
            navLine: block.querySelector('.navigation-bar .line-animation-bar')
        }

        const calculateTitle = () => {
            gsap.to(block.querySelector('.calculate-target'), {
                left: `${block.querySelector('.calculate-width').clientWidth + 40}px`
            })
        }

        calculateTitle()
        window.addEventListener('resize', calculateTitle)

        const calculateHeight = () => {
            els.fleetParent.forEach(oi => {
                var cal = 0
                oi.querySelectorAll('.calculate-height').forEach(el => {
                    if(el.clientHeight > cal) {
                        cal = el.clientHeight
                    }
                })
    
                oi.querySelectorAll('.calculate-height').forEach(el => {
                    gsap.to(el, {
                        height: cal
                    })
                })
            })
        }
        calculateHeight()
        window.addEventListener('resize', calculateHeight)

        new Swiper(els.slider, {
            slidesPerView: 1,
        })

        els.slider = els.slider.swiper

        els.sliderNav.next.addEventListener('click', () => {
            els.slider.slideNext()
        })
        els.sliderNav.prev.addEventListener('click', () => {
            els.slider.slidePrev()
        })
        els.fleetParent.forEach(oi => {
            oi.querySelectorAll('.navigation-target').forEach((el, i) => {
                el.anim = gsap.timeline({paused: true})
                el.anim.fromTo(el, {
                    'opacity': 0,
                    'display': 'none',
                    'duration': 0,
                    'ease': 'power3.Out'
                }, {
                    'opacity': 1,
                    'display': 'block',
                    'duration': 0,
                    'ease': 'power3.Out'
                }, 0)
    
                if(!i){ el.anim.play() } else {el.anim.reverse()}
            })
           
        })

        els.fleetParent.forEach((oi, i) => {
            oi.querySelectorAll('.navigation-bar .nav').forEach((el, i) => {
                if(!i) {
                    gsap.to(oi.querySelector('.navigation-bar .line-animation-bar'), {
                        width: el.clientWidth,
                        left: 0,
                    })
                }
                el.addEventListener('click', (e) => {
                    e.preventDefault()
                    oi.querySelectorAll('.navigation-target').forEach(o => o.anim.reverse())
                    oi.querySelector(`.navigation-target[data-index="${el.dataset.index}"]`).anim.play()
                    oi.querySelectorAll('.navigation-bar .nav').forEach(o => o.classList.remove('active'))
                    el.classList.add('active')
                })
                el.addEventListener('mouseover', () => {
                    gsap.to(oi.querySelector('.navigation-bar .line-animation-bar'), {
                        width: el.clientWidth,
                        left: el.offsetLeft,
                        ease: 'power3.Out',
                        duration: .4
                    })
                })
                el.addEventListener('mouseleave', () => {
                    gsap.to(oi.querySelector('.navigation-bar .line-animation-bar'), {
                        width: oi.querySelector('.navigation-bar .nav.active').clientWidth,
                        left: oi.querySelector('.navigation-bar .nav.active').offsetLeft,
                        duration: .4,
                        ease: 'power3.Out'
                    })
                })
            })
        })   

    })

})()