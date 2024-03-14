import gsap from "gsap"

(() => {

    document.addEventListener("DOMContentLoaded", () => {
        const main = document.querySelector('.block-button-hover')
        if(!main) {
            return false
        }

        main.querySelectorAll('.box').forEach(el => {
            el.anim = gsap.timeline({paused: true})
            el.anim.to(el, {
                backgroundColor: '#D75C00',
                duration: .1
            })
            el.addEventListener('mouseenter', () => {
                if(el.classList.contains('active')) return false
                main.querySelectorAll('.box').forEach(e => {
                    if(!e.classList.contains('active')) return false
                    e.classList.remove('active')
                    e.anim.reverse()
                })
                el.classList.add('active')
                el.anim.play()

            })
        })
    })

})()