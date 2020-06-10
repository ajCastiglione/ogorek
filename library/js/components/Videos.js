// Add placeholder to videos
function addPlaceholder($) {
  const video = $("video") || $("iframe");
  const defaultPlaceholderImg =
    "http://ogorek.com/wp-content/uploads/2018/11/7d1119db3034129b5863b4238d3cca58ea9e35d4-min.jpg";
  const placeholderSet = $("#span-placeholder").attr("data-src");
  const placeholderImg = placeholderSet
    ? placeholderSet
    : defaultPlaceholderImg;
  let placeholder = $(
    '<div style="background-image:url(' +
      placeholderImg +
      ')" class="placeholder"></div>'
  );

  if (video.length > 1) {
    $.each(video, function (index, el) {
      if ($(el).attr("name") && $(el).attr("name").match("gform")) return;

      $(el).addClass("yt-video");
      $(el).wrap('<div class="video"></div>');
      $(el).after(placeholder);
    });
  } else {
    if (video.attr("name") && video.attr("name").match("gform")) return;
    video.addClass("yt-video");
    video.wrap('<div class="video"></div>');
    video.after(placeholder);
  }
}

// Remove placeholder
function showVideo($) {
  let placeholder = $(".placeholder");
  placeholder.on("click", function (e) {
    placeholder.addClass("fadeOut");
    setTimeout(function () {
      placeholder.remove();
    }, 700);
  });
}

// Add preload to videos embedded in content
function addPlaceholderInternalPages($) {
  let videos = $(".entry-content .wp-video-shortcode source");
  if (videos.length > 0) {
    $.each(videos, function (index, video) {
      let src = $(video).attr("src");
      let removeQueryString = src.split("?")[0];
      let formattedSrc = removeQueryString + "#t=0.1";
      $(video).attr("src", formattedSrc);
    });
  }
}

// Defer loading of videos
function loadIframe() {
  if (!jQuery("body").hasClass("home")) return;
  var vidDefer = document.getElementsByTagName("iframe");
  for (var i = 0; i < vidDefer.length; i++) {
    if (vidDefer[i].getAttribute("data-src")) {
      vidDefer[i].setAttribute("src", vidDefer[i].getAttribute("data-src"));
    }
  }
}

module.exports = {
  loadIframe,
  addPlaceholder,
  addPlaceholderInternalPages,
  showVideo,
};
