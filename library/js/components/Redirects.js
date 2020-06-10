// Redirect from old #newsletter to contact page since its all in one
function newsletterRedirect() {
  let urlSplit = document.URL.split("#");
  if (urlSplit[1] && urlSplit.includes("newsletter")) {
    location.href = "https://ogorek.com/contact/";
  }
}

export default newsletterRedirect;
