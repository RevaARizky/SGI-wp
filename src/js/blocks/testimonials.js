import Packery from 'packery'

(function() {
  var elem = document.querySelector('.packery-grid');
  var pckry = new Packery( elem, {
    // options
    itemSelector: '.packery-grid-item',
    // gutter: 60,
    gutter: '.gutter-sizer',
    percentPosition: true
  });
})()