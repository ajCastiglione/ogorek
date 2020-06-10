// Reveal the newsletter signup form on contact page
function contactNewsletter($) {
  let btn = $("a[href*=letter]");
  let form = $("#gform_wrapper_4");

  btn.on("click", (e) => {
    e.preventDefault();
    form.show(500);
  });
}

export default contactNewsletter;
