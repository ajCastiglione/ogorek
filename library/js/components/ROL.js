export default function ROL($) {
  const doc = $("html, body");
  const container = $(".article-popup-container");
  const containerInner = $(".article-popup-container .content-wrap");
  const posts = $(".related-posts__container .related-posts__single");
  const close = $(".article-popup-container .close-popup");

  const handlePopup = (e) => {
    e.preventDefault();
    containerInner.empty();
    const target = $(e.target).closest(".related-posts__single");
    target
      .clone()
      .appendTo(containerInner)
      .find(".article-header")
      .wrapInner('<div class="content-wrap"></div>');
    container.removeClass("hidden");
    doc.css("overflow-y", "hidden");
  };

  const handleClose = (e, string) => {
    if (string == "keypress" && (e.keyCode === 27 || e.which === 27)) {
      doc.css("overflow-y", "auto");
      container.addClass("hidden");
      containerInner.empty();
    } else if (!string) {
      doc.css("overflow-y", "auto");
      container.addClass("hidden");
      containerInner.empty();
    }
  };

  posts.on("click", handlePopup);
  close.on("click", handleClose);
  doc.on("keyup", (e) => handleClose(e, "keypress"));
}
