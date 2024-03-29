(() => {

    document.addEventListener("DOMContentLoaded", () => {

        const main = document.querySelector('.block-icare-v2')
        if(!main) return false

        var tallest = 0
        main.querySelectorAll('.logo-wrapper').forEach(el => {
            if(el.clientHeight > tallest) {
                tallest = el.clientHeight
            }
        })

        main.querySelectorAll('.logo-wrapper').forEach(el => {
            el.style.height = `${tallest}px`
        })

    })

})()