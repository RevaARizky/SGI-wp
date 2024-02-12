import gsap from "gsap"

(() => {

    document.addEventListener("DOMContentLoaded", () => {
        gsap.to('.loop-infinite', {
            rotate: 360,
            repeat: -1,
            duration: 6,
            ease: 'none'
        })
    })
    
})()