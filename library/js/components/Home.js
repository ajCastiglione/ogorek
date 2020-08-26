export default function initHomeSlider($) {
  $(".home-team__slider").owlCarousel({
    margin: 50,
    nav: true,
    loop: true,
    lazyLoad: true,
    dots: false,
    stagePadding: 50,
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 2,
        stagePadding: 0,
      },
      1030: {
        items: 3,
      },
      1240: {
        items: 4,
      },
    },
    navText: [
      `<i class="fas fa-chevron-left"></i>`,
      `<i class="fas fa-chevron-right"></i>`,
    ],
  });
}
