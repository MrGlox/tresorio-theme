import "responsive-tabs/js/jquery.responsiveTabs";

class ResponsiveTabs {
  constructor() {
    this.links = document.querySelectorAll("button.tabs__item-link");
    this.init();
  }
  init() {
    jQuery("#tabs-system").responsiveTabs({
      collapsible: false,
      rotate: false
    });
    [].forEach.call(this.links, element => {
      element.addEventListener("click", () => {
        let link = element.getAttribute("href");
        window.location.href = link;
      });
    });
  }
}

export default ResponsiveTabs;
new ResponsiveTabs();
