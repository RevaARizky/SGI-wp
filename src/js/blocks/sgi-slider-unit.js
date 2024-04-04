import anim from '@/sgi-anim'

(() => {

    document.querySelectorAll('.block-slider-unit .slider .item-wrapper').forEach(el => {
        const interactHandler = (e) => {
            e.preventDefault()
            if(el.classList.contains('active')) {
                return
            }
            var content = JSON.parse(el.dataset.content)
            document.querySelectorAll('.item-wrapper').forEach(childel => {childel.classList.remove('active')})
            el.classList.add('active')

            // document.querySelector('.block-slider .hover-target-description').style.visibility = 'hidden';
            document.querySelector('.block-slider-unit .hover-target-image').style.backgroundImage = 'url(' + content.image.url + ')';
            document.querySelector('.block-slider-unit .hover-target-logo').src = content.logo.url
            document.querySelector('.block-slider-unit .hover-target-description').innerText = content.description
            document.querySelector('.block-slider-unit .hover-target-button').innerText = content.button.text
            document.querySelector('.block-slider-unit .hover-target-button').href = content.button.url


            anim.animateText(document.querySelector('.block-slider-unit .hover-target-description'), {
                baseDelay: 0
            })
        }
        el.addEventListener('click', interactHandler)
        el.addEventListener('mouseover', interactHandler)
    })

    document.querySelectorAll('.block-slider-unit .slider a').forEach(el => {
        el.addEventListener('click', function() {
            if(el.classList.contains('button-link')) {
                return true
            }
            el.preventDefault()
        })
    })


    

})()