/* global jQuery */

class ScrollTo {
  constructor() {
    this.scrollTop = document.querySelector(".js-scroll-top");
    this.links = document.querySelectorAll(".section a");

    // URL elements
    this.location = window.location;
    this.hash = window.location.hash;

    // Init elements listeners and logic
    this.init();
  }

  init() {
    [].forEach.call(this.links, element => {
      if (
        element.getAttribute("href").indexOf("#") === -1 ||
        element.getAttribute("href").length < 2
      ) {
        return;
      }

      const id = element
        .getAttribute("href")
        .slice(element.getAttribute("href").indexOf("#"));

      // if not a valid ID
      if (id.length < 2 || id.includes("tab")) {
        return;
      }

      element.addEventListener("click", ev => {
        ev.preventDefault();
        jQuery("html, body").animate(
          {
            scrollTop:
              document.querySelector(id).getBoundingClientRect().top - 60
          },
          700
        );
      });
    });
  }
}

export default ScrollTo;
new ScrollTo();
