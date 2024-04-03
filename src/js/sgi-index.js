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

    document.querySelector('.top-arrow').addEventListener('click', el => {
        gsap.to(window, {scrollTo: 0})
    })

    
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
