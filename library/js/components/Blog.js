// Add zoom functionality
function addImageZoom($) {
  if ($(window).width() <= 1024) return;
  // For the inner post imgs
  var postImgs = $(".imgzoom").parent(".post-image-wrapper");
  $.each(postImgs, function (idx, el) {
    var postImgOptions = {
      width: $(el).width(),
      zoomPosition: "original",
    };
    new ImageZoom(el, postImgOptions);
  });
}

// Add lightbox
function addLightbox($) {
  let imgs = $(".entry-content img").not(".featured-image");
  $.each(imgs, function (index, img) {
    let src = $(img).attr("src");
    $(img).wrap("<a href='" + src + "' class='foobox post-image-wrapper'></a>");
  });
}

// Toggle Save for later feature on single posts
function saveForLater($) {
  let saveBtn = $("#save-for-later");
  let close = $("#close-sfl");
  let form = $("#save-form");
  const urlParams = new URLSearchParams(window.location.search);
  const success = urlParams.get("success");

  if (success) {
    saveBtn
      .html("Successfully sent you the post!")
      .addClass("success")
      .removeAttr("href");
    return;
  }

  saveBtn.on("click", (e) => {
    e.preventDefault();
    form.addClass("active");
  });
  close.on("click", () => {
    form.removeClass("active");
  });
}

module.exports = {
  addLightbox,
  addImageZoom,
  saveForLater,
};
