import gsap from "gsap"
import Swiper, {EffectFade} from "swiper"

(() => {

    document.addEventListener("DOMContentLoaded", () => {
        let block = document.querySelector('.block-about-team-v2')
        if(!block) return false

        var slider = block.querySelector('.swiper')
        new Swiper(slider, {
            slidesPerView: 1,
            effect: 'fade',
            fadeEffect: true,
            modules: [EffectFade]
        })

        var images = gsap.utils.toArray('.block-about-team-v2 .image-box-wrapper .image-wrapper')
        var teams = gsap.utils.toArray('.block-about-team-v2 .team-wrapper')
        images.forEach(el => el.classList.add('active'))
        teams.forEach( el => {
            el.addEventListener('mouseover', e => {
                slider.swiper.slideTo(el.dataset.index)
                images.forEach(image => {
                    if(image.dataset.index == el.dataset.index) {
                        image.classList.add('active')
                        return false
                    }
                })
                teams.forEach(team => {
                    if(team.dataset.index == el.dataset.index) {
                        team.classList.add('active')
                        return false
                    }
                    team.classList.remove('active')
                })
            })
        })

        // const setWidth = () => {
        //     images.forEach(el => {
        //         gsap.to(el, {
        //             width: block.querySelector('.image-box-wrapper').clientWidth
        //         })
        //     })
        // }
        // setWidth()
        // window.addEventListener('resize', setWidth)


    })

})()