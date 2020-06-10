function smoothScroll($) {
  $('a[href*="#"]').on("click", function (e) {
    if (
      location.pathname.replace(/^\//, "") ==
        this.pathname.replace(/^\//, "") &&
      location.hostname == this.hostname
    ) {
      e.preventDefault();
      let target = $(this.hash);
      let nav = $(".shiftnav-shiftnav-main");

      if (target.selector.includes("newsletter")) {
        location.href = "https://ogorek.com/contact/";
      }

      if (nav) {
        nav.removeClass("shiftnav-open-target");
        $("body").removeClass("shiftnav-open-left");
        $("body").removeClass("shiftnav-open");
        $("body").addClass("shiftnav-transitioning");
      }

      if (target.offset()) {
        $("html, body").animate(
          {
            scrollTop: $("body").hasClass("page-id-564")
              ? target.offset().top - 210
              : target.offset().top - 170,
          },
          500,
          "linear"
        );
      }
    }
  });
}

export default smoothScroll;
