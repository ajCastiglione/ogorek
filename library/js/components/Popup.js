// Popup functionality
export function popup($) {
  let body = $("body");
  let modal = $(".popup");
  let exitModal = $(".popup.exit");
  let close = $(".popup .close");
  let date = new Date(Date.now() + 86400e3).toUTCString();
  let cookieString = "popShown=true; expires=" + date;
  let allCookies = document.cookie.split(";");
  sessionStorage.popHidden = false;

  // if popup was closed this session, don't show it again
  if (allCookies.find((row) => row.startsWith("popShown"))) {
    console.log("cookie found");
    return modal.remove();
  }

  // show popup
  if (modal.length > 0 && modal.hasClass("exit") === false) {
    setTimeout(function () {
      modal.addClass("active");
      body.addClass("popup-active");
    }, 7000);
  }

  // Show exit intent popup
  $(document, window).mouseleave((e) => {
    if (
      e.clientY < 0 &&
      exitModal.length > 0 &&
      sessionStorage.popHidden !== "true"
    ) {
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
    sessionStorage.popHidden = true;
  });

  body.on("click", function (e) {
    if (!$(e.target).closest(".inner-popup").length) {
      modal.removeClass("active");
      body.removeClass("popup-active");
      document.cookie = cookieString;
      document.cookie = cookieString;
      localStorage.popHidden = true;
    }
  });
}

// Successful newsletter signup
export function newsletterSignup($) {
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
