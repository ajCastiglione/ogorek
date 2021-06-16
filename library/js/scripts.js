import hasSubMenu from "./components/Menu";
import smoothScroll from "./components/SmoothScroll";
import Header from "./components/header/Header";
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
import { addLightbox, addImageZoom, newsletter } from "./components/Blog";
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
import initHomeSlider from "./components/Home";
import ROL from "./components/ROL";

/*
 * Put all your regular jQuery in here.
 */
jQuery(document).ready(function ($) {
  hasSubMenu($);
  smoothScroll($);
  Header($);
  showVideo($);
  newsletterSignup($);
  addPlaceholderInternalPages($);
  popup($);
  mobileMenuSubMenu($);
  scrollTop($);
  newsletterRedirect();

  if ($("body").hasClass("page-template-page-home")) {
    initHomeSlider($);
  }

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
    newsletter($);
  }

  if ($("body").hasClass("home")) {
    initSlider($);
  }

  if ($("body").hasClass("single-firms")) {
    trustChosen($);
    removeTitleQs($);
    createTrust($);
    removeCreate($);
    addCheck($);
  }

  setTimeout(() => {
    if (
      $("iframe").length > 0 &&
      $("iframe").attr("src") &&
      $("iframe").attr("src").includes("calendly")
    ) {
      prePopulateScheduler($);
    }
  }, 1000);

  if ($("body").hasClass("page-template-page-faq")) {
    toggleFAQ($);
  }

  if ($("body").hasClass("page-template-page-rol")) {
    ROL($);
  }
}); /* end of as page load scripts */

window.onload = loadIframe;
