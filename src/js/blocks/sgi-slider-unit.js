import anim from '@/sgi-anim'

(() => {

    const getIcon = (color = false) => {
        return `<div class="icon-wrapper mr-3"><svg width="20" height="35" viewBox="0 0 35 50" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M7.00854 37.7283C6.12197 38.1326 5.02048 38.1056 4.37571 37.5127C3.73093 36.9199 3.97273 36.1383 4.67123 35.5724C25.8413 18.9989 32.3428 0 32.3428 0C35.6741 8.46192 41.8263 22.2867 7.00854 37.7283Z" fill="${color ? color : '#fff'}"/>
        <path d="M4.46914 44.9974C3.41444 45.0255 2.41383 44.8291 2.08931 44.0995C1.76479 43.3418 2.35975 42.6403 3.30627 42.3036C16.9632 37.0842 23.5618 33.773 33 26C30.4579 39.9184 13.5287 44.7168 4.46914 44.9974Z" fill="${color ? color : '#fff'}"/>
        <path d="M1.90476 49.6497C0.870748 49.5465 0 49.0563 0 48.334C0 47.6117 0.843537 47.0183 1.90476 47.0183C11.4286 46.9151 18.7755 45.6252 24 44C19.3469 48.1018 14.585 51.0427 1.90476 49.6497Z" fill="${color ? color : '#fff'}"/>
        </svg></div>
        `
    }

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
            document.querySelector('.block-slider-unit .hover-target-button').innerText = content.button.text
            document.querySelector('.block-slider-unit .hover-target-button').href = content.button.url
            if(content.description_list) {
                document.querySelector('.block-slider-unit .hover-target-description').innerHTML = ''
                content.description_list.forEach(text => {
                    console.log(text.list)
                    document.querySelector('.block-slider-unit .hover-target-description').innerHTML += `<div class="flex items-center mb-3">${getIcon(content.color_theme)}${text.list}</div>`
                })
            } else {
                document.querySelector('.block-slider-unit .hover-target-description').innerText = content.description
            }


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