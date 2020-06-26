import Sticky from "sticky-js";

const $blindfold = document.querySelector("#blindfold");

let header, trigger;

if (!document.querySelector(".error404")) header = new Sticky(".header");
if (!document.querySelector(".error404")) trigger = new Sticky(".menu-trigger");

(() => {
  if (document.querySelector(".beta")) return;
  if (document.querySelector(".error404")) return;

  const $close = document.querySelector("#blindfold .blindfold__close");

  if ($blindfold) {
    $close.addEventListener("click", () => {
      header.destroy();
      trigger.destroy();

      $blindfold.classList.remove("blindfold--active");
      document.body.classList.remove("withBlindfold");
      window.localStorage.setItem("blindfoldClosed", true);

      header = new Sticky(".header");
      trigger = new Sticky(".menu-trigger");
    });

    if (!window.localStorage.getItem("blindfoldClosed")) {
      header.destroy();
      trigger.destroy();

      document.body.classList.add("withBlindfold");
      $blindfold.classList.add("blindfold--active");

      header = new Sticky(".header");
      trigger = new Sticky(".menu-trigger");
    }
  }
})();
