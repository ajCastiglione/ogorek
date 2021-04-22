export default function Header($) {
  const Header = {
    settings: {
      header: $(".top-header"),
      bod: $("body"),
    },

    init: function () {
      $(window).on("scroll", this.handleScroll);
    },

    handleScroll: function () {
      const sticky = Header.settings.header[0].offsetTop;
      if (window.pageYOffset > sticky) {
        Header.settings.header.addClass("sticky");
        Header.settings.bod.css(
          "padding-top",
          Header.settings.header.outerHeight()
        );
      } else {
        Header.settings.header.removeClass("sticky");
        Header.settings.bod.css("padding-top", 0);
      }
    },
  };

  Header.init();
}
