// import Swiper, { Pagination, Autoplay } from 'swiper';
import 'glightbox/dist/css/glightbox.min.css';
import GLightbox from 'glightbox';

(function () {
  GLightbox({ selector: '.glightbox', loop: true })

  const trigger = document.querySelector('.js-popup-trigger')
  if (trigger) {
    trigger.addEventListener('click', function () {
      document.querySelector('.popup').classList.remove('hidden')
    })
  }

  const close = document.querySelector('.js-popup-close')
  if (close) {
    close.addEventListener('click', function () {
      document.querySelector('.popup').classList.add('hidden')
    })
  }
})()

// (function () {
//   const targets = document.querySelectorAll('.js-carousel-rooms')
//   if (targets) {
//     targets.forEach(target => {
//       if (target) {
//         new Swiper(target, {
//           modules: [Pagination, Autoplay],
//           loop: true,
//           autoplay: true,
//           pagination: {
//             el: '.swiper-pagination',
//             type: 'bullets',
//             clickable: true
//           },
//         })
//       }
//     });
//   }
// })()