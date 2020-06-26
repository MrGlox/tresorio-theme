import rangeSliderJs from "rangeslider-js";

class RenderingAnimation {
  constructor() {
    // or initialize multiple
    this.$ranges = document.querySelectorAll(".range");
    this.$packs = document.querySelectorAll(
      ".rendering__list .rendering__item"
    );
    this.$price = document.querySelector(".js-rendering-price");

    this.total = 0;

    this.divisor = 1;
    this.time = 1;
    this.price = 2;

    this.init = this.init.bind(this);
    this.initPackSelection = this.initPackSelection.bind(this);
    this.calculatePrice = this.calculatePrice.bind(this);

    this.init();
    this.initPackSelection();
  }

  calculatePrice(value = this.divisor) {
    const { time, price } = this;

    this.divisor = value;

    this.total = Math.round(time * price * value * 10) / 10;
    this.$price.innerHTML = `${this.total}<span class="rendering__currency">€</span>`;
  }

  // async fetchPrices() {
  //   return fetch("https://api.tresorio.com/user/products/assets/vps-pricing")
  //     .then(res => {
  //       console.log(res.json());
  //       return res.json();
  //     })
  //     .then(data => {
  //       // Work with JSON data here
  //       console.log(data);
  //       return data;
  //     })
  //     .catch(err => {
  //       console.log(err);
  //       return null;
  //     });
  // }

  initPackSelection() {
    [...this.$packs].map(element => {
      const value = element.querySelector(".rendering__item-value").innerHTML;
      const button = element.querySelector(".rendering__item-link");

      const price = Number(value.substr(0, value.indexOf("<")));

      button.addEventListener("click", ev => {
        ev.preventDefault();

        const containClass = element.classList.contains(
          "rendering__item--active"
        );

        [...this.$packs].map(item => {
          item.classList.remove("rendering__item--active");
        });

        if (containClass) {
          const value = [...this.$packs][0].querySelector(
            ".rendering__item-value"
          ).innerHTML;

          const price = Number(value.substr(0, value.indexOf("<")));
          this.price = price;

          this.calculatePrice();
          return false;
        }

        this.price = price;
        this.calculatePrice();

        element.classList.add("rendering__item--active");
      });
    });
  }

  init() {
    const _self = this;

    this.prices = this.pricesInit; // ADD FETCH REQUEST

    const showTicks = (element, percent) => {
      const spanMin = element.querySelector(".rangeslider__ticks--min");
      const spanMax = element.querySelector(".rangeslider__ticks--max");

      if (percent < 0.05) {
        spanMin.classList.add("hidden");
      } else {
        spanMin.classList.remove("hidden");
      }

      if (percent > 0.9) {
        spanMax.classList.add("hidden");
      } else {
        spanMax.classList.remove("hidden");
      }
    };

    if (this.$ranges.length >= 1) {
      rangeSliderJs.create(this.$ranges, {
        onInit: function(value, percent) {
          this.handle.innerHTML = `<span class="rangeslider__handle-value">${value}</span>`;

          const spanMin = document.createElement("span");
          spanMin.classList.add(
            "rangeslider__ticks",
            "rangeslider__ticks--min"
          );
          spanMin.innerHTML = this.element.min;

          const spanMax = document.createElement("span");
          spanMax.classList.add(
            "rangeslider__ticks",
            "rangeslider__ticks--max"
          );
          spanMax.innerHTML = this.element.max;

          this.range.appendChild(spanMin);
          this.range.appendChild(spanMax);

          showTicks(this.range, percent);
          _self.calculatePrice();
        },
        onSlide: function(value, percent) {
          this.handle.innerHTML = `<span class="rangeslider__handle-value">${value}</span>`;

          showTicks(this.range, percent);

          _self.calculatePrice(value);
        }
      });
    }
  }
}

export default RenderingAnimation;

if (document.querySelector(".rendering")) new RenderingAnimation();
