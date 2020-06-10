// Landing page form toggle
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

export default showForm;
