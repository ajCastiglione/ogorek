function scrollTop($) {
  let btn = $("#scrollTop");
  let bod = $("html, body");
  btn.on("click", () => {
    bod.animate({
      scrollTop: "0",
    });
  });
  $(window).on("scroll", () => {
    if (bod.scrollTop() >= 500) {
      btn.fadeIn(300);
    } else {
      btn.fadeOut(300);
    }
  });
}

export default scrollTop;
