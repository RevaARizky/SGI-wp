import gsap from "gsap";
import ScrollToPlugin from "gsap/ScrollToPlugin";
import $ from "jquery"
(($) => {
    window.scrollTo(0,0)
    document.addEventListener('DOMContentLoaded', function() {
        gsap.registerPlugin(ScrollToPlugin)
        window.isNavOpen = false;
        // const openNav = () => {
        //     document.querySelector('aside#nav').classList.add('active')
        //     document.querySelector('header#header .menu-wrapper').classList.add('active')
        //     window.isNavOpen = true;
        // }

        // const closeNav = () => {
        //     document.querySelector('aside#nav').classList.remove('active')
        //     document.querySelector('header#header .menu-wrapper').classList.remove('active')
        //     document.querySelectorAll('aside#nav .link-dropdown').forEach(el => {el.classList.remove('active')})
        //     document.querySelectorAll('aside#nav .link .dropdown').forEach(el => {el.classList.remove('active')})
        //     window.isNavOpen = false;
        // }

        // document.querySelector('header#header .hamburger-menu').addEventListener('click', openNav)
        // document.querySelector('aside#nav .close-menu').addEventListener('click', closeNav)

        // document.querySelectorAll('aside#nav .link .dropdown').forEach(el => {
        //     el.addEventListener('click', function(e) {
        //         e.preventDefault()
        //         if(el.classList.contains('active')) {
        //             el.classList.remove('active')
        //             el.parentElement.querySelector('.link-dropdown').classList.remove('active')
        //         } else {
        //             el.classList.add('active')
        //             el.parentElement.querySelector('.link-dropdown').classList.add('active')
        //         }
        //     })
        // })

        document.addEventListener('keydown', function(e) {
            e = e || window.event
            if(e.key == 'Escape' && window.isNavOpen) {
                closeNav()
            }
        })

        if(document.querySelector('.block-header-unit .scroll-trigger')) {

            document.querySelector('.block-header-unit .scroll-trigger').addEventListener('click' , () => {
                let headerEl = gsap.utils.toArray('section')
                headerEl.forEach((el, i) => {
                    if(el.classList.contains('block-header-unit')) {
                        gsap.to(window, {scrollTo: headerEl[++i]})
                    }
                    // return false
                })
            })
        }

        const menuAction = () => {
            this.menuState = false
            this.anims = []
            this.index = 0
            this.els = {
                hamburger: document.querySelector('#hamburger'),
                menuMobile: document.querySelector('#menu-mobile'),
                closeMenu: document.querySelectorAll('#menu-mobile .close')
            }

            const generateAnim = (el, from, to) => {
                this.index += 1
                this.anims[this.index] = gsap.timeline({paused: true})
                this.anims[this.index].fromTo(el, {...from, ease: 'power3.Out'}, {...to, ease: 'power3.Out', duration: .4}, 0)
            }
            const animHandler = (action = 'play') => {
                this.anims.forEach(i => {
                    if(action == 'play') {
                        i.play()
                    } else {
                        i.reverse()
                    }
                })
            }
            const openMenu = () => {
                animHandler('play')
                this.menuState = true
            }

            const closeMenu = () => {
                animHandler('reverse')
                this.menuState = false
            }

            generateAnim(this.els.menuMobile, {autoAlpha: 0}, {autoAlpha: 1})

            this.els.hamburger.addEventListener('click', (e) => {
                e.preventDefault()
                openMenu()
            })
            this.els.closeMenu.forEach(el => {
                el.addEventListener('click', (e) => {
                    e.preventDefault()
                    closeMenu()
                })
            })
        }
        menuAction()


    // let loadingScreen = document.querySelector('#loading-screen')

    // document.onreadystatechange =  function() {
    //         if (document.readyState !== "complete") {
    //             document.querySelector(
    //               "body").style.visibility = "hidden";
    //             document.querySelector(
    //               "#loading-screen").style.visibility = "visible";
    //         } else {
    //             document.querySelector(
    //               "#loading-screen").style.display = "none";
    //             document.querySelector(
    //               "body").style.visibility = "visible";
    //         }
    //     };

    // document.querySelector('.top-arrow').addEventListener('click', el => {
    //     gsap.to(window, {scrollTo: 0})
    // })

        const headerScrollAction = (self) => {
            this.index = -1
            this.anim = []

            const generateAnim = (el, from, to) => {
                this.index += 1
                this.anim[this.index] = gsap.timeline({paused: true})
                this.anim[this.index].fromTo(el, {...from, ease: 'power3.inOut'}, {...to, ease: 'power3.inOut', duration: .4}, 0)
            }

            const playAnim = () => {
                this.anim.forEach(i => {i.play()})
            }
            const reverseAnim = () => {
                this.anim.forEach(i => {i.reverse()})
            }

            generateAnim('#header', {
                paddingTop: '40px',
                paddingBottom: 0,
                backgroundColor: 'rgba(52,99,121,0)'
            }, {
                paddingTop: '25px',
                paddingBottom: '15px',
                backgroundColor: 'rgba(52,99,121,1)'
            })
            generateAnim('#header svg.main-logo', {
                width: '148px',
                height: '93px'
            }, {
                width: '120px',
                height: '65px'
            })
    
            self.addEventListener('scroll', e => {
                if(window.scrollY > 30) {
                    playAnim()
                } else {
                    reverseAnim()
                }
            })
        }

        headerScrollAction(window)


    
    })

var eventName
if(window.cp_loadingpage) {
    eventName = 'loadingScreenCompleted'
} else {
    eventName = 'DOMContentLoaded'
}
$(document).on(eventName, () => {
    document.documentElement.style.setProperty("--sgi-header", `${document.querySelector('header#header').clientHeight}px`);
})

})($)
