/* global jQuery */
import Masonry from "masonry-layout";

class FacetWp {
  constructor() {
    this.scrollTop = false;
    this.facetExist = false;

    this.msnry = new Masonry(".entries--masonry .entries__list", {
      containerStyle: null,
      percentPosition: true,
      originLeft: true,
      originTop: true,
      horizontalOrder: true,
      itemSelector: ".entries__item"
    });

    this.init();
  }

  /**
   * Initialization fonction
   */
  init() {
    jQuery(document).on("facetwp-loaded", () => {
      if (!this.scrollTop) {
        jQuery("html, body").animate({ scrollTop: 0 }, 700);
        this.scrollTop = true;
      }

      this.facetExist = true;

      this.msnry.reloadItems();
      this.msnry.layout();

      // Update Masonry layout after each image loads
      // this.msnry.imagesLoaded().progress(() => {
      //   this.msnry.layout();
      // });
    });

    if (!this.facetExist) {
      this.msnry.reloadItems();
      this.msnry.layout();
    }
  }
}

export default FacetWp;

if (document.querySelector(".entries--masonry")) new FacetWp();
