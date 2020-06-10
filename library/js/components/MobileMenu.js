function mobileMenuSubMenu($) {
  let navUl = $(".shiftnav-nav .shiftnav-menu");
  let parent = navUl.find(".menu-item-has-children");
  let btn = parent.children(".shiftnav-target");
  $.each(btn, (idx, el) => {
    !$(el).parent().hasClass("menu-item-has-children")
      ? null
      : $(el).html($(el).html() + " <i class='fas fa-plus'></i>");
  });
  btn.on("click", (e) => {
    e.preventDefault();
    $(e.target).parent().children(".sub-menu").slideDown(400);
    if ($(e.target).hasClass("fas")) {
      return;
    } else if (
      !$(e.target).hasClass("fas") &&
      $(e.target).parent().children(".sub-menu").css("display") == "block"
    ) {
      $(e.target).unbind(e);
    }
  });
  $(btn)
    .find(".fas")
    .on("click", (e) => {
      $(e.target)
        .closest(".menu-item-has-children")
        .children(".sub-menu")
        .slideToggle(400);
    });
}

export default mobileMenuSubMenu;
