import { ScrollTrigger } from "gsap/ScrollTrigger"
import { ScrollSmoother } from "gsap/ScrollSmoother"
import { SplitText } from "gsap/SplitText"
import { Observer } from "gsap/Observer"
import {gsap} from "gsap"

gsap.registerPlugin(ScrollTrigger, ScrollSmoother, SplitText, Observer)

// const animateText = (elArg, opt) => {
//     let arr = util.extractLinesFromTextNode(elArg.firstChild)
//     var delay = (opt?.baseDelay || 0.2) - (opt?.delay || 0.15)
//     elArg.dataset.text = elArg.innerHTML
//     jQuery(elArg).text('')
//     jQuery(elArg).css('visibility', 'visible')
//     jQuery(elArg).addClass('loaded')
//     arr.forEach(text => {
//         delay += opt?.delay || 0.15
//         jQuery(elArg).append(`<span class="animate-wrapper block overflow-hidden lh"><span class="break-wrapper leading-tight inline-block" data-delay="${delay}" style="transform: translateY(110%);">${text}</span></span>`)
//     })
//     elArg.querySelectorAll('.break-wrapper').forEach(function(breakEl) {
//         gsap.to(breakEl, {
//             scrollTrigger: {
//                 trigger: elArg,
//                 once: true,
//                 end: "bottom"
//             },
//             translateY: 0,
//             visibility: 'visible',
//             ease: 'power3.out',
//             delay: parseFloat(breakEl.dataset.delay)
//         })
//     })
// }

// const resetText = (e) => {
//     document.querySelectorAll('.animate-text').forEach(el => {
//         el.innerHTML = el.dataset.text
//     })
// }

// window.onresize = resetText

const animateText = (el) => {
    el.split = new SplitText(el, {
        type: el.dataset.textType || 'words',
        linesClass: 'split-line overflow-hidden',
        wordsClass: 'split-word overflow-hidden leading-tight'
    })


    // gsap.from(el.split.chars, {
    //     translateY: '100%',
    //     opacity: 0,
    //     ease: 'power3.out',
    //     stagger: .4
    //     // delay: parseFloat(el.dataset)
    // })

    let tl = gsap.timeline({
        scrollTrigger: {
            trigger: el,
            once: true,
            end: 'bottom'
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
                // duration: .2
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
    // el.split.lines.forEach(line => {

    //     tl.from(line, {
    //         translateY: '100%',
    //         opacity: 0,
    //         duration: .3
    //     })
    
    //     tl.to(line, {
    //         ease: 'power3.out',
    //         translateY: 0,
    //         duration: .001
    //     })
    // })


    // gsap.to(el.split.chars, {
    //     scrollTrigger: {
    //         trigger: el,
    //         toggleActions: "restart pause resume reverse",
    //         once: true,
    //         end: 'bottom'
    //     },
    //     translateY: 0,
    //     opacity: 1,
    //     visibility: 'visible',
    //     ease: 'power3.out',
    //     stagger: .4
    //     // delay: parseFloat(el.dataset)
    // })
}


window.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.animate-text').forEach(el => {
        animateText(el)
    })
})


// window.addEventListener('resize', resetText)



// document.querySelectorAll('.animate-text').forEach(el => {
//     animateText(el)
// })

document.addEventListener('DOMContentLoaded', function() {
    const smoother = ScrollSmoother.create({
        content: '#primary',
        smooth: 2,
        effects: true,
        normalizeScroll: true,
        // onUpdate: (self) => {
        //     console.log(self.offset())
        //     // var offset = (currentScrollY - ($(el).outerHeight() - windowHeight + $(el).data("offset")));
        //     // console.log(offset)
        // }
      });
      
      window.ScrollTrigger = ScrollTrigger

      let mm = gsap.matchMedia()

      mm.add('(min-width: 1025px)', () => {
        // const ob = new IntersectionObserver((entry, obs) => {
        //     console.log(entry.target, entry)
        //     entry.forEach(en => {
        //         if(en.intersectionRatio < 0.20) {
        //             en.target
        //         }
        //     })
        // }, {rootMargin: '0px', threshold: [0.15, 0.5]})
        let sections = gsap.utils.toArray('section')
        console.log(sections)
        //   sections.forEach((section, i) => {
        //     // console.log(section)
        //     // ob.observe(section)
        //     section.style.zIndex = i
        //     section.style.position = 'relative'
        //     if(section.classList.contains('block-our-fleet')) {
        //         return false
        //     }
        //     if(section.classList.contains('no-anim')) {
        //         return false
        //     }
        //     if(sections.length == ++i) {
        //         return false
        //     }
        //     // if(!section.classList.contains('block-image-overlay')) {
        //     //     return false
        //     // }
        //     section.inner = section.querySelector('.outer-wrapper') || section.querySelector('.container')
        //     let sectl = gsap.timeline({
        //         scrollTrigger: {
        //             trigger: section,
        //             // start: '100vh',
        //             // start: 'bottom bottom',
        //             end: 'bottom+=10%',
        //             // markers: true,
        //             // pin: true,
        //             scrub: true,
        //             // anticipatePin: 1,
        //             // invalidateOnRefresh: true,
        //             onUpdate: (self) => {
        //                 // console.log(self)
        //             }
        //         },
        //     })
        //     if(section.inner) {
        //         // sectl.fromTo(section, 
        //         //     {
        //         //         translateY: '0%'
        //         //     },
        //         //     {
        //         //         translateY: `${window.innerHeight}px`,
                        
        //         //     }
        //         // )
        //         // sectl.from(section.inner, {
        //         //     translateY: 0,
        //         // })
        //         sectl.from(section, {
        //             y: 0
        //         })
        //         sectl.to(section, {
        //             y: section.inner.offsetHeight / 4
        //         })
        //     }
        //   })

      })
      

    //   document.querySelectorAll('section').forEach((el, i) => {
    //     // smoother.effects(el, {speed: 1 + (i * .2)})
    //     let sectl = gsap.timeline({
    //         scrollTrigger: {
    //             trigger: el,
    //             start: 'top bottom',
    //             end: 'bottom top'
    //         }
    //     })
    //     sectl.from(el, {
    //         translateY: 0
    //     })
    //     sectl.to(el, {
    //         ease: 'power3.out',
    //         translateY: '80%'
    //     })
    //     // gsap.fromTo(el, 
    //     //     {
    //     //         translateY: 0
    //     //     },
    //     //     {
    //     //         ease: 'power3.out',
    //     //         translateY: '80%',
    //     //     }
    //     // )
    //   })

// gsap.utils.toArray("#header-section, .block-slider").forEach((section, i) => {
//   section.bg = section.querySelector(".outer-wrapper"); 
//   // Give the backgrounds some random images
  
//   // the first image (i === 0) should be handled differently because it should start at the very top.
//   // use function-based values in order to keep things responsive
//   gsap.fromTo(section.bg, 
//     {
//         backgroundPosition: '50% 30%'
//     },
//     {
//         backgroundPosition: '50% 70%',
//         ease: "none",
//         scrollTrigger: {
//             trigger: section,
//             start: 'top bottom', 
//             end: 'bottom top',
//             scrub: .8,
//             invalidateOnRefresh: true // to make it responsive
//         }
//   });

// });
    

    //   smoother.effects('img', {speed: .9, lag: .3})
})

export default {
    animateText,
    // resetText
}