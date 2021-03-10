export default function ROL($) {
  const doc = $("html, body");
  const container = $(".article-popup-container");
  const containerInner = $(".article-popup-container .article-popup-inner");
  const containerWrap = $(".article-popup-container .content-wrap");
  const posts = $(".related-posts__container .related-posts__single");
  const close = $(".article-popup-container .close-popup");

  const handlePopup = (e) => {
    e.preventDefault();
    containerWrap.empty();
    const target = $(e.target).closest(".related-posts__single");
    target
      .clone()
      .appendTo(containerWrap)
      .find(".article-header")
      .wrapInner('<div class="content-wrap"></div>');
    container.removeClass("hidden");
    containerInner.scrollTop(0);
    doc.css("overflow-y", "hidden");

    // Handle box shadow if content overflows
    if (
      containerInner[0].scrollHeight - containerInner.scrollTop() ==
      Math.floor(containerInner.outerHeight())
    ) {
      containerInner.removeClass("shadow");
    } else {
      containerInner.addClass("shadow");
    }
  };

  const handleClose = (e, string) => {
    if (string == "keypress" && (e.keyCode === 27 || e.which === 27)) {
      doc.css("overflow-y", "auto");
      container.addClass("hidden");
      containerWrap.empty();
    } else if (!string) {
      doc.css("overflow-y", "auto");
      container.addClass("hidden");
      containerWrap.empty();
    }
  };

  const handleShadow = () => {
    if (
      containerInner[0].scrollHeight - containerInner.scrollTop() ==
      Math.floor(containerInner.outerHeight())
    ) {
      containerInner.removeClass("shadow");
    } else {
      containerInner.addClass("shadow");
    }
  };

  posts.on("click", handlePopup);
  close.on("click", handleClose);
  doc.on("keyup", (e) => handleClose(e, "keypress"));
  containerInner.on("scroll", handleShadow);
}
