function initSlider($) {
  $(".owl-carousel").owlCarousel({
    items: 1,
    nav: true,
    dots: false,
    rewind: true,
    autoplay: true,
    autoplayTimeout: 7500,
    autoplayHoverPause: true,
    lazyload: true,
    navText: [
      '<i class="fas fa-chevron-left slick-prev"></i>',
      '<i class="fas fa-chevron-right slick-next"></i>',
    ],
  });
}

export default initSlider;
