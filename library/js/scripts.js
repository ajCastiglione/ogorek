function hasSubMenu($) {
  let arrow = '<i class="fas fa-chevron-down"></i>';
  let item = $(".nav li.menu-item-has-children > a");
  item.append(arrow);
}

function mobileMenuSubMenu($) {
  let navUl = $(".shiftnav-nav .shiftnav-menu");
  let parent = navUl.find(".menu-item-has-children");
  let btn = parent.children(".shiftnav-target");
  $.each(btn, (idx, el) => {
    !$(el).parent().hasClass("menu-item-has-children")
      ? null
      : $(el).html($(el).html() + " <i class='fas fa-plus'></i>");
  });
  btn.on("click", (e) => {
    e.preventDefault();
    $(e.target).parent().children(".sub-menu").slideDown(400);
    if ($(e.target).hasClass("fas")) {
      return;
    } else if (
      !$(e.target).hasClass("fas") &&
      $(e.target).parent().children(".sub-menu").css("display") == "block"
    ) {
      $(e.target).unbind(e);
    }
  });
  $(btn)
    .find(".fas")
    .on("click", (e) => {
      $(e.target)
        .closest(".menu-item-has-children")
        .children(".sub-menu")
        .slideToggle(400);
    });
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

function addLightbox($) {
  let imgs = $(".entry-content img").not(".featured-image");
  $.each(imgs, function (index, img) {
    let src = $(img).attr("src");
    $(img).wrap("<a href='" + src + "' class='foobox post-image-wrapper'></a>");
  });
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
      '<i class="fas fa-chevron-right slick-next"></i>',
    ],
  });
}

function addPlaceholder($) {
  const video = $("video") || $("iframe");
  const defaultPlaceholderImg =
    "http://ogorek.com/wp-content/uploads/2018/11/7d1119db3034129b5863b4238d3cca58ea9e35d4-min.jpg";
  const placeholderSet = $("#span-placeholder").attr("data-src");
  const placeholderImg = placeholderSet
    ? placeholderSet
    : defaultPlaceholderImg;
  let placeholder = $(
    '<div style="background-image:url(' +
      placeholderImg +
      ')" class="placeholder"></div>'
  );

  if (video.length > 1) {
    $.each(video, function (index, el) {
      if ($(el).attr("name") && $(el).attr("name").match("gform")) return;

      $(el).addClass("yt-video");
      $(el).wrap('<div class="video"></div>');
      $(el).after(placeholder);
    });
  } else {
    if (video.attr("name") && video.attr("name").match("gform")) return;
    video.addClass("yt-video");
    video.wrap('<div class="video"></div>');
    video.after(placeholder);
  }
}

function showVideo($) {
  let placeholder = $(".placeholder");
  placeholder.on("click", function (e) {
    placeholder.addClass("fadeOut");
    setTimeout(function () {
      placeholder.remove();
    }, 700);
  });
}

function popup($) {
  let body = $("body");
  let modal = $(".popup");
  let close = $(".popup .close");
  let date = new Date(Date.now() + 86400e3).toUTCString();
  let cookieString = "popShown=true; expires=" + date;
  // if popup was closed this session, don't show it again
  if (document.cookie.match("popShown")) {
    modal.remove();
    return;
  }
  // show popup
  if (modal.length > 0) {
    setTimeout(function () {
      modal.addClass("active");
      body.addClass("popup-active");
    }, 5000);
  }

  close.on("click", function (e) {
    e.preventDefault();
    modal.removeClass("active");
    body.removeClass("popup-active");
    document.cookie = cookieString;
    document.cookie = cookieString;
    setTimeout(function () {
      modal.remove();
    }, 1200);
  });

  body.on("click", function (e) {
    if (!$(e.target).closest(".inner-popup").length) {
      modal.removeClass("active");
      body.removeClass("popup-active");
      document.cookie = cookieString;
      document.cookie = cookieString;
      setTimeout(function () {
        modal.remove();
      }, 1200);
    }
  });
}

function smoothScroll($) {
  $('a[href*="#"]').on("click", function (e) {
    if (
      location.pathname.replace(/^\//, "") ==
        this.pathname.replace(/^\//, "") &&
      location.hostname == this.hostname
    ) {
      e.preventDefault();
      let target = $(this.hash);
      let nav = $(".shiftnav-shiftnav-main");

      if (nav) {
        nav.removeClass("shiftnav-open-target");
        $("body").removeClass("shiftnav-open-left");
        $("body").removeClass("shiftnav-open");
        $("body").addClass("shiftnav-transitioning");
      }

      $("html, body").animate(
        {
          scrollTop: $("body").hasClass("page-id-564")
            ? target.offset().top - 210
            : target.offset().top - 170,
        },
        500,
        "linear"
      );
    }
  });
}

function newsletterSignup($) {
  jQuery(document).on("gform_confirmation_loaded", function (event, formId) {
    // code to be trigger when confirmation page is loaded
    setTimeout(function () {
      let body = $("body");
      let modal = $(".popup");
      modal.removeClass("active");
      body.removeClass("popup-active");
      localStorage.popShown = true;
      setTimeout(function () {
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
  cta.on("click", function (e) {
    container.addClass("active");
    form.addClass("active");
    body.addClass("popup-active");
  });
  // Hide form
  close.on("click", function (e) {
    e.preventDefault();
    form.removeClass("active");
    body.removeClass("popup-active");
    container.removeClass("active");
  });
}

// Append search icon
function addSearchIcon($) {
  let icon = '<i class="fas fa-search"></i>';
  $(".top-header .form-container").append(icon);
}

// Law firm scripts
function trustChosen($) {
  let trustForm = $("#trusts");
  trustForm.change(function (e) {
    let val = $(this).val();
    let url = document.location;
    if (url.href.match("trust")) {
      let url = document.location.href.split("&trust")[0];
      document.location = url + "&trust=" + val;
    } else {
      document.location = url + "&trust=" + val;
    }
  });

  // Update trust title
  $("#updateField").on("click", function (e) {
    let newTitle = $("#trustTitle").val();
    let url = document.location;
    if (url.href.match("title")) {
      let url = document.location.href.split("&title")[0];
      document.location = url + "&title=" + newTitle;
    } else {
      document.location = url + "&title=" + newTitle;
    }
  });
}

function createTrust($) {
  $("#addTrust").on("click", function (e) {
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
      document.location = url + "&create=" + newTrustTitle;
      $(".alert-error").fadeOut();
    } else {
      document.location = url + "&create=" + newTrustTitle;
      $(".alert-error").fadeOut();
    }
  });
}

function removeCreate($) {
  let url = document.location.href;
  setTimeout(function () {
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
    urlArr.forEach(function (element, index) {
      if (element.match(toRemove) !== null) {
        urlArr.splice(index, index);
        document.location = urlArr.join("&");
      }
    });
  }
}

// Add check to completed form options
function addCheck($) {
  let btn = $(".trusts .form .btn.completed");
  btn.html("Form Completed" + '<i class="fas fa-check"></i>');
}

// Add preload to videos embedded in content
function addPlaceholderInternalPages($) {
  let videos = $(".entry-content .wp-video-shortcode source");
  if (videos.length > 0) {
    $.each(videos, function (index, video) {
      let src = $(video).attr("src");
      let removeQueryString = src.split("?")[0];
      let formattedSrc = removeQueryString + "#t=0.1";
      $(video).attr("src", formattedSrc);
    });
  }
}

// Add zoom functionality
function addImageZoom($) {
  if ($(window).width() <= 1024) return;
  // var imgWidth = document.getElementsByClassName("featured-image")[0]
  //   .offsetWidth;
  // var options = {
  //   width: imgWidth, // required
  //   zoomPosition: "original",
  //   // more options here
  // };
  // new ImageZoom(document.getElementsByClassName("foobox")[0], options);
  // For the inner post imgs
  var postImgs = $(".post-image-wrapper");
  $.each(postImgs, function (idx, el) {
    var postImgOptions = {
      width: $(el).width(),
      zoomPosition: "original",
    };
    new ImageZoom(el, postImgOptions);
  });
}

/*
 * Put all your regular jQuery in here.
 */
jQuery(document).ready(function ($) {
  hasSubMenu($);
  smoothScroll($);
  showVideo($);
  newsletterSignup($);
  addSearchIcon($);
  addPlaceholderInternalPages($);
  popup($);
  mobileMenuSubMenu($);

  if ($("body").hasClass("page-template-page-landing-marketing")) {
    showForm($);
  }

  if ($("body").hasClass("single-post")) {
    addLightbox($);
    addImageZoom($);
  }

  if ($("body").hasClass("home")) {
    initSlider($);
  }

  if ($("body").hasClass("firms-template-page-secured")) {
    trustChosen($);
    removeTitleQs($);
    createTrust($);
    removeCreate($);
    addCheck($);
  }
  /*
  if (
    $("iframe").length > 0 &&
    !$("body").hasClass("home") &&
    !$("body").hasClass("page-id-286") &&
    !$("body").hasClass("page-id-375") &&
    !$("body").hasClass("page-id-2351") &&
    !$("body").hasClass("page-id-3928")
  ) {
    addPlaceholder($);
    showVideo($);
  } */
}); /* end of as page load scripts */

window.onload = loadIframe;
