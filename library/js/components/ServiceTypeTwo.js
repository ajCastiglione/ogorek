export default function ServiceTypeTwo($) {
  const doc = $("html, body");
  const container = $(".service-popup-container");
  const containerInner = $(".service-popup-container .service-popup-inner");
  const containerWrap = $(".service-popup-container .content-wrap");
  const values = $(".home-values .value");
  const trigger = $(".home-values .value .read-more");
  const close = $(".service-popup-container .close-popup");

  const handlePopup = (e) => {
    e.preventDefault();
    containerWrap.empty();
    const target = $(e.target).closest(".value");
    console.log(target);
    target.clone().appendTo(containerWrap);
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

  trigger.on("click", handlePopup);
  close.on("click", handleClose);
  doc.on("keyup", (e) => handleClose(e, "keypress"));
  containerInner.on("scroll", handleShadow);
}
