function prePopulateScheduler($) {
  const urlParams = new URLSearchParams(window.location.search);
  const firstName = urlParams.get("fname");
  const lastName = urlParams.get("lname");
  const email = urlParams.get("email");
  const phone = urlParams.get("phone");
  const scheduler = $("iframe[src*=acuity]");
  const formattedURL = `${scheduler.attr(
    "src"
  )}&firstName=${firstName}&lastName=${lastName}&phone=${phone}&email=${email}`;

  scheduler.attr("src", formattedURL);
}

export default prePopulateScheduler;
