/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
 */
function updateViewportDimensions() {
  var w = window,
    d = document,
    e = d.documentElement,
    g = d.getElementsByTagName("body")[0],
    x = w.innerWidth || e.clientWidth || g.clientWidth,
    y = w.innerHeight || e.clientHeight || g.clientHeight;
  return { width: x, height: y };
}
// setting the viewport width
var viewport = updateViewportDimensions();

/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
 */
var waitForFinalEvent = (function() {
  var timers = {};
  return function(callback, ms, uniqueId) {
    if (!uniqueId) {
      uniqueId = "Don't call this twice without a uniqueId";
    }
    if (timers[uniqueId]) {
      clearTimeout(timers[uniqueId]);
    }
    timers[uniqueId] = setTimeout(callback, ms);
  };
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
 */
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
    jQuery(".comment img[data-gravatar]").each(function() {
      jQuery(this).attr("src", jQuery(this).attr("data-gravatar"));
    });
  }
} // end function

function hasSubMenu($) {
  let arrow = '<i class="fas fa-chevron-down"></i>';
  let item = $(".nav li.menu-item-has-children > a");
  item.append(arrow);
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
    $(window).trigger("resize");
  }

  if (
    $("iframe").length > 0 &&
    !$("body").hasClass("home") &&
    !$("body").hasClass("page-id-286")
  ) {
    addPlaceholder($);
    showVideo($);
  }
}); /* end of as page load scripts */
