(() => {

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.block-image-overlay .overlay-button-wrapper').forEach((el, i) => {
            el.addEventListener('click', function() {
                console.log('clicked')
                if(document.querySelector(`.block-image-overlay .overlay-item[data-overlay="${el.dataset.target}"]`).classList.contains('active')) {
                    document.querySelector(`.block-image-overlay .overlay-item[data-overlay="${el.dataset.target}"]`).classList.remove('active')
                    return                    
                }
                document.querySelector(`.block-image-overlay .overlay-item[data-overlay="${el.dataset.target}"]`).classList.add('active')
            })
        })
    })

})()