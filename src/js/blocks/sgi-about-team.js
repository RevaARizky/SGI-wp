import gsap from "gsap"

(() => {

    document.addEventListener("DOMContentLoaded", () => {
        let block = document.querySelector('.block-about-team')
        if(!block) {
            return false
        }

        var images = gsap.utils.toArray('.block-about-team .image-box-wrapper .image-wrapper')
        var teams = gsap.utils.toArray('.block-about-team .team-wrapper')
        teams.forEach( el => {
            el.addEventListener('mouseover', e => {
                images.forEach(image => {
                    if(image.dataset.index == el.dataset.index) {
                        image.classList.add('active')
                        return false
                    }
                    image.classList.remove('active')
                })
                teams.forEach(team => {
                    if(team.dataset.index == el.dataset.index) {
                        team.classList.add('active')
                        return false
                    }
                    team.classList.remove('active')
                })
            })
            el.addEventListener('mousemove', e => {
                console.log(e)
                if(images) {
                    var imageHeight
                    images.forEach(image => {if(image.classList.contains('active')){imageHeight = image.querySelector('img').offsetHeight}})
                    // let imageYPos = (((e.pageY - block.querySelector('.image-box-wrapper').offsetTop) - (imageHeight/2)) + e.screenY) /2
                    let imageYPos = e.pageY - (imageHeight/2)
                    gsap.to(images, {
                        y: imageYPos,
                        duration: 1.3,
                        ease: "back.out(1)"
                    })
                }
            })
            el.addEventListener('mouseleave', e => {
                images.forEach(image => {
                    image.classList.remove('active')
                    return false
                })
                teams.forEach(team => {
                    team.classList.remove('active')
                    return false
                })
            })
        })

        const setWidth = () => {
            images.forEach(el => {
                gsap.to(el, {
                    width: block.querySelector('.image-box-wrapper').clientWidth
                })
            })
        }
        setWidth()
        window.addEventListener('resize', setWidth)


    })

})()