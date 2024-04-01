import gsap from "gsap"

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

})()