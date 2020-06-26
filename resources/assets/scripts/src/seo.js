/**
 * Enable full area link on card like items using a link.
 * Only one link on the title
 */

import "../polyfill/forEach";

class SeoLink {
  /**
   * Spread link of a content to his top level element
   * @param {string} selector
   */
  static bind(selector) {
    [].forEach.call(
      document.querySelectorAll(selector),
      element => new SeoLink(element)
    );
  }

  /**
   * @param {HTMLElement} element
   */
  constructor(element) {
    this.element = element;
    this.setupTimer = this.setupTimer.bind(this);
    this.handleClick = this.handleClick.bind(this);
    this.element.addEventListener("mousedown", this.setupTimer, false);
    this.element.addEventListener("mouseup", this.handleClick, false);
  }

  /**
   * Start timer to prevent long press
   * @param {Event} e
   */
  setupTimer(e) {
    this.start = Date.now();
    this.startX = e.clientX;
  }

  /**
   * Listen for a short click on a card
   * @param {Event} e
   */
  handleClick(e) {
    e.preventDefault();
    this.end = Date.now();
    this.endX = e.clientX;
    const timeout = Math.round(this.end - this.start);

    if (timeout > 600 || Math.abs(this.startX - this.endX) > 100) {
      return false;
    }

    if (this.element.querySelectorAll("a")[1]) {
      const url = this.element.querySelectorAll("a")[1].getAttribute("href");

      if (this.element.querySelectorAll("a")[1].hasAttribute("target"))
        return window.open(url, "_blank");

      window.open(url, "_self");
    }
  }
}

export default SeoLink;
SeoLink.bind("[data-seo]");
