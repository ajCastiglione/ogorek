import hasSubMenu from "./components/Menu";
import smoothScroll from "./components/SmoothScroll";
import {
  showVideo,
  loadIframe,
  addPlaceholderInternalPages,
} from "./components/Videos";
import { popup, newsletterSignup } from "./components/Popup";
import mobileMenuSubMenu from "./components/MobileMenu";
import scrollTop from "./components/ScrollTop";
import newsletterRedirect from "./components/Redirects";
import contactNewsletter from "./components/ContactPage";
import { addLightbox, addImageZoom, saveForLater } from "./components/Blog";
import initSlider from "./components/Slider";
import {
  addCheck,
  removeTitleQs,
  removeCreate,
  createTrust,
  trustChosen,
} from "./components/Trust";
import prePopulateScheduler from "./components/Scheduler";
import showForm from "./components/LandingPage";
import toggleFAQ from "./components/FAQ";
import inputMask from "./components/Masking";

/*
 * Put all your regular jQuery in here.
 */
jQuery(document).ready(function ($) {
  hasSubMenu($);
  smoothScroll($);
  showVideo($);
  newsletterSignup($);
  addPlaceholderInternalPages($);
  popup($);
  mobileMenuSubMenu($);
  scrollTop($);
  newsletterRedirect();

  if ($("body").hasClass("wpforms-template-default")) {
    inputMask($);
  }

  if ($("body").hasClass("page-template-page-contact")) {
    contactNewsletter($);
  }

  if ($("body").hasClass("page-template-page-landing-marketing")) {
    showForm($);
  }

  if ($("body").hasClass("single-post")) {
    addLightbox($);
    addImageZoom($);
    saveForLater($);
  }

  if ($("body").hasClass("home")) {
    initSlider($);
  }

  if ($("body").hasClass("firms-template-page-secured")) {
    trustChosen($);
    removeTitleQs($);
    createTrust($);
    removeCreate($);
    addCheck($);
  }

  setTimeout(() => {
    if (
      $("iframe").length > 0 &&
      $("iframe").attr("src").includes("calendly")
    ) {
      prePopulateScheduler($);
    }
  }, 1000);

  if ($("body").hasClass("page-template-page-faq")) {
    toggleFAQ($);
  }
}); /* end of as page load scripts */

window.onload = loadIframe;
