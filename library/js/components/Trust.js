// Law firm scripts
function trustChosen($) {
  let trustForm = $("#trusts");
  trustForm.change(function (e) {
    let val = $(this).val();
    let url = document.location;
    if (url.href.match("trust")) {
      let url = document.location.href.split("&trust")[0];
      document.location = url + "&trust=" + val;
    } else {
      document.location = url + "&trust=" + val;
    }
  });

  // Update trust title
  $("#updateField").on("click", function (e) {
    let newTitle = $("#trustTitle").val();
    let url = document.location;
    if (url.href.match("title")) {
      let url = document.location.href.split("&title")[0];
      document.location = url + "&title=" + newTitle;
    } else {
      document.location = url + "&title=" + newTitle;
    }
  });
}

// Create a new trust
function createTrust($) {
  $("#addTrust").on("click", function (e) {
    let url = document.location;
    let newTrustTitle = $("#trustTitle").val();
    let curTitle = document
      .querySelector("#trusts")
      .options.namedItem("trust-" + $("#trusts").val()).text;

    if (newTrustTitle == curTitle) {
      $(".alert-error").fadeIn();
      return;
    }

    if (url.href.match("create")) {
      let url = document.location.href.split("&create")[0];
      document.location = url + "&create=" + newTrustTitle;
      $(".alert-error").fadeOut();
    } else {
      document.location = url + "&create=" + newTrustTitle;
      $(".alert-error").fadeOut();
    }
  });
}

// Remove the create query string and redirect to self
function removeCreate($) {
  let url = document.location.href;
  setTimeout(function () {
    if (url.match("create") && !url.match("created")) {
      let urlArr = url.split("&create")[0];
      let created = url.split("&create")[1];
      window.history.pushState(
        { page: 1 },
        document.title,
        urlArr + "&created" + created
      );
      window.location.reload();
    }
  }, 500);
}

// Remove title query string from url and redirect back to self
function removeTitleQs($) {
  let url = document.location.href;
  let urlArr = url.split("&");
  let toRemove = "title";
  if (url.match(toRemove) !== null) {
    urlArr.forEach(function (element, index) {
      if (element.match(toRemove) !== null) {
        urlArr.splice(index, index);
        document.location = urlArr.join("&");
      }
    });
  }
}

// Add check to completed form options
function addCheck($) {
  let btn = $(".trusts .form .btn.completed");
  btn.html("Form Completed" + '<i class="fas fa-check"></i>');
}

module.exports = {
  addCheck,
  removeTitleQs,
  removeCreate,
  createTrust,
  trustChosen,
};
