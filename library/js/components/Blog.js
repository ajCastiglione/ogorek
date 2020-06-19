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
    console.log(src);
    $(img).wrap("<a href='" + src + "' class='foobox post-image-wrapper'></a>");
  });
}

module.exports = {
  addLightbox,
  addImageZoom,
};
