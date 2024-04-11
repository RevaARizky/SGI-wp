import { ScrollTrigger } from "gsap/ScrollTrigger"
import { ScrollSmoother } from "gsap/ScrollSmoother"
import { SplitText } from "gsap/SplitText"
import {gsap} from "gsap"
import $ from "jquery"

gsap.registerPlugin(ScrollTrigger, ScrollSmoother, SplitText)

const animateText = (el) => {
    el.split = new SplitText(el, {
        type: el.dataset.textType || 'words',
        linesClass: 'split-line overflow-hidden',
        wordsClass: 'split-word overflow-hidden leading-tight'
    })

    let tl = gsap.timeline({
        scrollTrigger: {
            trigger: el,
            once: true,
            // end: 'bottom'
        },
    })
    if(el.dataset.textType == 'lines') {
        tl.from(el.split.lines, 
            {
                translateY: '100%',
                opacity: 0,
                duration: .4,
                ease: 'power3.out',
                stagger: .1
            } 
        )
        tl.to(el.split.lines, 
            {
                translateY: 0,
                opacity: 1,
            }
        )
    } else {
        tl.from(el.split.words, 
            {
                translateY: '100%',
                opacity: 0,
                duration: .3,
                stagger: .06
            } 
        )
        tl.to(el.split.words, 
            {
                ease: 'power3.out',
                translateY: 0,
                opacity: 1,
                duration: .2
            }
        )
    }
}
const mm = gsap.matchMedia()
mm.add('(min-width: 768px)', () => {
    window.smoother = ScrollSmoother.create({
        smooth: 1,
        effects: true,
        normalizeScroll: true,
    });
    smoother
})
window.scrollSmoother = ScrollSmoother

window.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.animate-text').forEach(el => {
        animateText(el)
    })
    window.scrollTrigger = ScrollTrigger
    const borderEl = gsap.utils.toArray('.custom-border-anim')
    // borderEl.forEach(el => {
    //     const bordertl = gsap.timeline({
    //         scrollTrigger: {
    //             start: 'center center',
    //             once: true,
    //         }
    //     })
    //     bordertl.to(el, {
    //         borderBottom: '1px solid #fff',
    //         duration: 1,
    //     })
    // })

})

export default {
    animateText,
    // resetText
}