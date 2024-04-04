(() => {

    document.addEventListener("DOMContentLoaded", () => {

        const main = document.querySelector('.block-itrac-icare')
        if(!main) return false

        const sameHeight = () => {
            var tallest = 0
            main.querySelectorAll('.icare .logo-wrapper').forEach(el => {
                if(el.clientHeight > tallest) {
                    tallest = el.clientHeight
                }
            })
    
            main.querySelectorAll('.icare .logo-wrapper').forEach(el => {
                el.style.height = `${tallest}px`
            })
        }

        const revertHeight = () => {
            main.querySelectorAll('.icare .logo-wrapper').forEach(el => {
                el.style.height = `auto`
            })
        }

        const checkResize = () => {
            if(window.innerWidth > 768) {
                sameHeight()
            } else {
                revertHeight()
            }
        }

        window.addEventListener('resize', checkResize)
        checkResize()

    })

})()