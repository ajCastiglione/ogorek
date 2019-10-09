function hasSubMenu($) {
  let arrow = '<i class="fas fa-chevron-down"></i>';
  let item = $(".nav li.menu-item-has-children > a");
  item.append(arrow);
}

function loadIframe() {
  if (!jQuery("body").hasClass("home")) return;
  var vidDefer = document.getElementsByTagName("iframe");
  for (var i = 0; i < vidDefer.length; i++) {
    if (vidDefer[i].getAttribute("data-src")) {
      vidDefer[i].setAttribute("src", vidDefer[i].getAttribute("data-src"));
    }
  }
}

function initSlider($) {
  $(".owl-carousel").owlCarousel({
    items: 1,
    nav: true,
    dots: false,
    rewind: true,
    autoplay: true,
    autoplayTimeout: 7500,
    autoplayHoverPause: true,
    lazyLoad: true,
    navText: [
      '<i class="fas fa-chevron-left slick-prev"></i>',
      '<i class="fas fa-chevron-right slick-next"></i>'
    ]
  });
}

function addPlaceholder($) {
  let iframe = $("iframe");
  let placeholder = $(
    '<div style="background-image:url(http://ogorek.local/wp-content/uploads/2018/11/7d1119db3034129b5863b4238d3cca58ea9e35d4-min.jpg)" class="placeholder"></div>'
  );
  iframe.addClass("yt-video");
  iframe.wrap('<div class="video"></div>');
  iframe.after(placeholder);
}

function showVideo($) {
  let placeholder = $(".placeholder");
  placeholder.on("click", e => {
    placeholder.addClass("fadeOut");
    setTimeout(() => {
      placeholder.remove();
    }, 700);
  });
}

function smoothScroll($) {
  $('a[href*="#"]').on("click", function(e) {
    if (
      location.pathname.replace(/^\//, "") ==
        this.pathname.replace(/^\//, "") &&
      location.hostname == this.hostname
    ) {
      e.preventDefault();
      let target = $(this.hash);
      console.log(target);

      $("html, body").animate(
        {
          scrollTop: target.offset().top - 100
        },
        500,
        "linear"
      );
    }
  });
}

/*
 * Put all your regular jQuery in here.
 */
jQuery(document).ready(function($) {
  /*
   * Let's fire off the gravatar function
   * You can remove this if you don't need it
   */
  // loadGravatars();

  hasSubMenu($);
  smoothScroll($);
  showVideo($);

  if ($("body").hasClass("home")) {
    initSlider($);
  }

  if (
    $("iframe").length > 0 &&
    !$("body").hasClass("home") &&
    !$("body").hasClass("page-id-286") &&
    !$("body").hasClass("page-id-375") &&
    !$("body").hasClass("page-id-2351")
  ) {
    addPlaceholder($);
    showVideo($);
  }
}); /* end of as page load scripts */

window.onload = loadIframe;
