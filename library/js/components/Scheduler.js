function prePopulateScheduler($) {
  const urlParams = new URLSearchParams(window.location.search);
  const firstName = urlParams.get("fname");
  const lastName = urlParams.get("lname");
  const email = urlParams.get("email");
  const phone = urlParams.get("phone");
  const scheduler = $("iframe[src*=calendly]");
  let formattedURL;
  if (firstName && lastName) {
    formattedURL = `${scheduler.attr(
      "src"
    )}&name=${firstName}%20${lastName}&a1=${phone}&email=${email}`;
    scheduler.attr("src", formattedURL);
  } else {
    return;
  }
}

export default prePopulateScheduler;
