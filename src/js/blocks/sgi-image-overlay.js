import gsap from "gsap"

(() => {

    document.addEventListener('DOMContentLoaded', () => {

        document.querySelectorAll('.block-image-overlay .image-wrapper').forEach((el, i) => {
            el.addEventListener('click', function() {
                console.log('clicked')
                if(document.querySelector(`.block-image-overlay .overlay-item[data-overlay="${el.dataset.target}"]`).classList.contains('active')) {
                    document.querySelector(`.block-image-overlay .overlay-item[data-overlay="${el.dataset.target}"]`).classList.remove('active')
                    return                    
                }
                document.querySelector(`.block-image-overlay .overlay-item[data-overlay="${el.dataset.target}"]`).classList.add('active')
            })
        })

        const imgArr = gsap.utils.toArray('.block-image-overlay .image-wrapper')
        imgArr.forEach(el => {
            let img = el.querySelector('img')
            let tl = gsap.timeline({
                paused: true,
            })
            img.anim = tl.fromTo(img, {
                scale: 1,
            }, {
                scale: 1.5
            })
            el.addEventListener('mouseenter', (e) => {
                img.anim.duration(40)
                img.anim.play()
            })
            el.addEventListener('mouseleave', () => {
                img.anim.duration(0)
                img.anim.reverse()
            })
        })

    })

})()