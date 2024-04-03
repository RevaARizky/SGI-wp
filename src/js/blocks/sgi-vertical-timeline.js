import gsap from "gsap"
import ScrollTrigger from "gsap/ScrollTrigger"

(() => {

    document.addEventListener('DOMContentLoaded', () => {
        const main = document.querySelector('.block-vertical-timeline')
        if(!main) return false

        const els = {
            items: main.querySelectorAll('.vertical-item')
        }

        const calculatePositionAdditional = () => {
            els.items.forEach(el => {
                if(!el.querySelector('.additional-wrapper')) return false
                let widthText = el.querySelector('.text-wrapper').clientWidth
                if(el.classList.contains('item-left')) {
                    el.querySelector('.additional-wrapper').style.left = `${widthText}px`
                    el.querySelector('.additional-wrapper').style.right = 0
                } else {
                    el.querySelector('.additional-wrapper').style.right = `${widthText}px`
                    el.querySelector('.additional-wrapper').style.left = 0
                }
            })
        }


        window.addEventListener('resize', calculatePositionAdditional)

        calculatePositionAdditional()

        
    })

    document.addEventListener('DOMContentLoaded', () => {
        const main = document.querySelector('.block-vertical-timeline')
        if(!main) return false
        gsap.registerPlugin(ScrollTrigger)

        const els = {
            mainLine: main.querySelector('.vertical-line'),
            line: main.querySelector('.vertical-line-progress'),
            items: main.querySelectorAll('.vertical-item')
        }


        gsap.registerPlugin(ScrollTrigger)
        var lastProgress = 0
        var tl = gsap.timeline({scrollTrigger: {
            trigger: els.mainLine,
            start: "top center",
            end: "bottom center",
            onUpdate: self => {
                if(lastProgress > self.progress) return false
                lastProgress = self.progress
                gsap.to(els.line, {
                    height: `${lastProgress * 100}%`
                })
                if(lastProgress >= 1) {
                    ScrollTrigger.refresh()
                }
            }
        }})

        els.items.forEach((el, i) => {
            if(!el.querySelector('.more-text-wrapper')) return false

            function refresh() {
                tl.scrollTrigger.refresh()
                els.items.forEach(el => {
                    el.animTl.scrollTrigger.refresh()
                })
            }
            

            el.animTl = gsap.timeline({
                onStart: () => {el.classList.add('active')},
                onComplete: refresh,
                scrollTrigger: {
                    trigger: el.querySelector('.item-trigger'),
                    start: "center center-=20px",
                }
            })
            el.animTl.to(el.querySelector('.more-text-wrapper'), {
                height: 'auto',
            })
        })

    })

})()