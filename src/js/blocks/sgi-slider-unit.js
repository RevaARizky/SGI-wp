import anim from '@/sgi-anim'

(() => {

    document.querySelectorAll('.block-slider .slider .item-wrapper').forEach(el => {
        el.addEventListener('mouseover', function(e) {
            e.preventDefault()
            if(el.classList.contains('active')) {
                return
            }
            var content = JSON.parse(el.dataset.content)
            document.querySelectorAll('.item-wrapper').forEach(childel => {childel.classList.remove('active')})
            el.classList.add('active')

            // document.querySelector('.block-slider .hover-target-description').style.visibility = 'hidden';
            document.querySelector('.block-slider .hover-target-image').style.backgroundImage = 'url(' + content.image.url + ')';
            document.querySelector('.block-slider .hover-target-logo').src = content.logo.url
            document.querySelector('.block-slider .hover-target-description').innerText = content.description
            document.querySelector('.block-slider .hover-target-button').innerText = content.button.text
            document.querySelector('.block-slider .hover-target-button').href = content.button.url


            anim.animateText(document.querySelector('.block-slider .hover-target-description'), {
                baseDelay: 0
            })
        })
    })

    document.querySelectorAll('.block-slider .slider a').forEach(el => {
        el.addEventListener('click', function() {
            if(el.classList.contains('button-link')) {
                return true
            }
            el.preventDefault()
        })
    })


    

})()