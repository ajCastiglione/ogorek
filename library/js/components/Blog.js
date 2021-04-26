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

// Newsletter slide out
function newsletter($) {
  let btn = $("a[href*=letter]");
  let form = $("#gform_wrapper_4");

  if (form.hasClass("gform_validation_error")) {
    form.show(300);
  }

  btn.on("click", (e) => {
    e.preventDefault();
    form.show(500);
  });
}

module.exports = {
  addLightbox,
  addImageZoom,
  newsletter,
};
