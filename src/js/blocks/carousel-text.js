// import Swiper, { Pagination, Autoplay } from 'swiper';

// const target = document.querySelector('.js-carousel-text-carousel')
// if (target) {
//   new Swiper(target, {
//     modules: [Pagination, Autoplay],
//     loop: true,
//     autoplay: true,
//     pagination: {
//       el: '.swiper-pagination',
//       type: 'bullets',
//       clickable: true
//     },
//   })
// }

import 'glightbox/dist/css/glightbox.min.css';
import GLightbox from 'glightbox';

(function() {
  GLightbox({selector: '.glightbox', loop: true})
})()