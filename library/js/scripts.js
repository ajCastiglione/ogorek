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

function initSlickHome($) {
  $(".slider").slick({
    autoplay: true,
    autoplaySpeed: 7500,
    pauseOnHover: true,
    arrows: true,
    dots: false,
    nextArrow: '<i class="fas fa-chevron-right slick-next"></i>',
    prevArrow: '<i class="fas fa-chevron-left slick-prev"></i>'
  });
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

/*
 * Put all your regular jQuery in here.
 */
jQuery(document).ready(function($) {
  /*
   * Let's fire off the gravatar function
   * You can remove this if you don't need it
   */
  loadGravatars();
  hasSubMenu($);
  if ($("body").hasClass("home")) {
    initSlickHome($);
    showVideo($);
  }
}); /* end of as page load scripts */
