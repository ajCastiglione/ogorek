// Popup functionality
function popup($) {
  let body = $("body");
  let modal = $(".popup");
  let exitModal = $(".popup.exit");
  let close = $(".popup .close");
  let date = new Date(Date.now() + 86400e3).toUTCString();
  let cookieString = "popShown=true; expires=" + date;
  // if popup was closed this session, don't show it again
  if (document.cookie.match("popShown")) {
    modal.remove();
    return;
  }
  // show popup
  if (modal.length > 0 && modal.hasClass("exit") === false) {
    setTimeout(function () {
      modal.addClass("active");
      body.addClass("popup-active");
    }, 7000);
  }

  // Show exit intent popup
  $(document).on("mouseleave", (e) => {
    if (e.clientY < 0) {
      exitModal.addClass("active");
      body.addClass("popup-active");
    }
  });

  close.on("click", function (e) {
    e.preventDefault();
    modal.removeClass("active");
    body.removeClass("popup-active");
    document.cookie = cookieString;
    document.cookie = cookieString;
    // setTimeout(function () {
    //   modal.remove();
    // }, 1200);
  });

  body.on("click", function (e) {
    if (!$(e.target).closest(".inner-popup").length) {
      modal.removeClass("active");
      body.removeClass("popup-active");
      document.cookie = cookieString;
      document.cookie = cookieString;
      // setTimeout(function () {
      //   modal.remove();
      // }, 1200);
    }
  });
}

// Successful newsletter signup
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

module.exports = {
  newsletterSignup,
  popup,
};
