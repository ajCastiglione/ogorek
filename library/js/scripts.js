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
    lazyload: true,
    navText: [
      '<i class="fas fa-chevron-left slick-prev"></i>',
      '<i class="fas fa-chevron-right slick-next"></i>'
    ]
  });
}

function addPlaceholder($) {
  let iframe = $("iframe");
  if (!iframe.attr("src").includes("youtube")) return;
  let placeholder = $(
    '<div style="background-image:url(http://ogorek.local/wp-content/uploads/2018/11/7d1119db3034129b5863b4238d3cca58ea9e35d4-min.jpg)" class="placeholder"></div>'
  );
  iframe.addClass("yt-video");
  iframe.wrap('<div class="video"></div>');
  iframe.after(placeholder);
}

function showVideo($) {
  let placeholder = $(".placeholder");
  placeholder.on("click", function(e) {
    placeholder.addClass("fadeOut");
    setTimeout(function() {
      placeholder.remove();
    }, 700);
  });
}

function popup($) {
  let body = $("body");
  let modal = $(".popup");
  let close = $(".popup .close");
  // if popup was closed this session, don't show it again
  if (sessionStorage.popShown || localStorage.popShown) {
    modal.remove();
    return;
  }
  // show popup
  setTimeout(function() {
    modal.addClass("active");
    body.addClass("popup-active");
  }, 1500);

  close.on("click", function(e) {
    e.preventDefault();
    modal.removeClass("active");
    body.removeClass("popup-active");
    sessionStorage.popShown = true;
    setTimeout(function() {
      modal.remove();
    }, 1200);
  });

  body.on("click", function(e) {
    if (!$(e.target).closest(".inner-popup").length) {
      modal.removeClass("active");
      body.removeClass("popup-active");
      sessionStorage.popShown = true;
      setTimeout(function() {
        modal.remove();
      }, 1200);
    }
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

function newsletterSignup($) {
  jQuery(document).on("gform_confirmation_loaded", function(event, formId) {
    // code to be trigger when confirmation page is loaded
    setTimeout(function() {
      let body = $("body");
      let modal = $(".popup");
      modal.removeClass("active");
      body.removeClass("popup-active");
      localStorage.popShown = true;
      setTimeout(function() {
        modal.remove();
      }, 1200);
    }, 3500);
  });
}

function showForm($) {
  let cta = $(".get-started");
  let form = $(".form");
  let container = $(".popup-container");
  let body = $("body");
  let close = $(".form .close");
  // Show form
  cta.on("click", function(e) {
    container.addClass("active");
    form.addClass("active");
    body.addClass("popup-active");
  });
  // Hide form
  close.on("click", function(e) {
    e.preventDefault();
    form.removeClass("active");
    body.removeClass("popup-active");
    container.removeClass("active");
  });
}

// Law firm scripts
function trustChosen($) {
  let trustForm = $("#trusts");
  trustForm.change(function(e) {
    let val = $(this).val();
    let url = document.location;
    if (url.href.match("trust")) {
      let url = document.location.href.split("&trust")[0];
      document.location = `${url}&trust=${val}`;
    } else {
      document.location = `${url}&trust=${val}`;
    }
  });

  // Update trust title
  $("#updateField").on("click", function(e) {
    let newTitle = $("#trustTitle").val();
    let url = document.location;
    if (url.href.match("title")) {
      let url = document.location.href.split("&title")[0];
      document.location = `${url}&title=${newTitle}`;
    } else {
      document.location = `${url}&title=${newTitle}`;
    }
  });
}

function createTrust($) {
  $("#addTrust").on("click", function(e) {
    let url = document.location;
    let newTrustTitle = $("#trustTitle").val();
    let curTitle = document
      .querySelector("#trusts")
      .options.namedItem("trust-" + $("#trusts").val()).text;

    if (newTrustTitle == curTitle) {
      $(".alert-error").fadeIn();
      return;
    }

    if (url.href.match("create")) {
      let url = document.location.href.split("&create")[0];
      document.location = `${url}&create=${newTrustTitle}`;
      $(".alert-error").fadeOut();
    } else {
      document.location = `${url}&create=${newTrustTitle}`;
      $(".alert-error").fadeOut();
    }
  });
}

function removeCreate($) {
  let url = document.location.href;
  setTimeout(function() {
    if (url.match("create") && !url.match("created")) {
      let urlArr = url.split("&create")[0];
      let created = url.split("&create")[1];
      window.history.pushState(
        { page: 1 },
        document.title,
        urlArr + "&created" + created
      );
      window.location.reload();
    }
  }, 500);
}

function removeTitleQs($) {
  let url = document.location.href;
  let urlArr = url.split("&");
  let toRemove = "title";
  if (url.match(toRemove) !== null) {
    urlArr.forEach(function(element, index) {
      if (element.match(toRemove) !== null) {
        urlArr.splice(index, index);
        document.location = urlArr.join("&");
      }
    });
  }
}

/*
 * Put all your regular jQuery in here.
 */
jQuery(document).ready(function($) {
  hasSubMenu($);
  smoothScroll($);
  showVideo($);
  newsletterSignup($);

  if ($("body").hasClass("page-template-page-landing-marketing")) {
    showForm($);
  }

  if ($("body").hasClass("firms-template-page-secured")) {
    trustChosen($);
    removeTitleQs($);
    createTrust($);
    removeCreate($);
  }

  if ($("body").hasClass("home")) {
    initSlider($);
    popup($);
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
