import rangeSliderJs from "rangeslider-js";

class ServerAnimation {
  constructor() {
    // or initialize multiple
    this.$ranges = document.querySelectorAll(".range");
    this.$switch = document.querySelector(".switch");
    this.$price = document.querySelector(".js-server-price");

    this.$elements = {
      cpu: document.querySelectorAll(".cpu .content"),
      gpu: document.querySelectorAll(".gpu .content"),
      ram: document.querySelectorAll(".ram .content"),
      storage: {
        hdd: document.querySelectorAll(".hdd .content"),
        ssd: document.querySelectorAll(".ssd .content")
      }
    };

    this.$hddList = [...document.querySelectorAll(".hdd")];
    this.$ssdList = [...document.querySelectorAll(".ssd")];

    this.$serverPrice = document.querySelector(".server__price");

    this.levels = {
      cpu: [0, 16],
      ram: [0, 20, 40, 80, 120],
      storage: [0, 1000, 2000, 3000],
      gpu: [0, 1]
    };

    this.formValues = {
      cpu: 6,
      gpu: 0,
      ram: 16,
      storage: 50,
      storageType: false
    };

    this.total = 0;
    this.multiplier = 1;

    this.prices = {};
    this.pricesInit = {
      vcpu: 0.022,
      ram: 0.0016,
      storage: [
        { name: "ssd", price: 0.000058 },
        { name: "hdd", price: 0.000015 }
      ],
      gpu: [
        { name: "RTX 5000", capacity: 16, price: 0.639 },
        { name: "RTX 4000", capacity: 8, price: 0.243 },
        { name: "Titan RTX", capacity: 24, price: 0.649 },
        { name: "2080 TI", capacity: 11, price: 0.45 },
        { name: "T4", capacity: 16, price: 0.667 }
      ],
      os: [{ name: "ubuntu", price: 0 }]
    };

    this.init = this.init.bind(this);
    this.majDisplay = this.majDisplay.bind(this);
    this.triggerShow = this.triggerShow.bind(this);
    this.changeTimeUnit = this.changeTimeUnit.bind(this);
    this.calculatePrice = this.calculatePrice.bind(this);

    this.init();
  }

  calculatePrice() {
    const { cpu, gpu, ram, storage, storageType } = this.formValues;
    const storageNumberType = storageType ? 1 : 0;

    const cpuPrice = cpu * this.prices.vcpu;
    const gpuPrice = gpu * this.prices.gpu[1].price;
    const ramPrice = ram * this.prices.ram;
    const storagePrice = storage * this.prices.storage[storageNumberType].price;

    this.total =
      Math.round(
        (cpuPrice + gpuPrice + ramPrice + storagePrice) * this.multiplier * 100
      ) / 100;

    this.$price.innerHTML = `${this.total}<span class="server__currency">€</span>`;
  }

  changeTimeUnit() {
    if (this.multiplier === 1) {
      this.multiplier = 720;
      this.$serverPrice.classList.add("server__price--month");
    } else {
      this.multiplier = 1;
      this.$serverPrice.classList.remove("server__price--month");
    }

    this.calculatePrice();
  }

  triggerShow(el, key, value) {
    const currentNode = [...el];
    const activeElements = this.levels[key].filter(
      levelValue => value > levelValue
    );

    currentNode.map((e, index) => {
      if (index < activeElements.length) {
        e.classList.add("content--active");
      } else e.classList.remove("content--active");

      return false;
    });
  }

  majDisplay(id, value) {
    this.formValues[id] = value;
    this.calculatePrice();

    if (!NodeList.prototype.isPrototypeOf(this.$elements[id])) {
      Object.keys(this.$elements[id]).map(subKey => {
        return this.triggerShow(this.$elements[id][subKey], id, value);
      });

      return;
    }

    this.triggerShow(this.$elements[id], id, value);
    return;
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

  async init() {
    const _self = this;

    this.prices = this.pricesInit; // ADD FETCH REQUEST

    if (this.$switch)
      this.$switch.addEventListener("change", this.changeTimeUnit);

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

    if (this.$ranges.length > 1) {
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

          _self.changeTimeUnit();
          return _self.majDisplay(this.element.id, value);
        },
        onSlide: function(value, percent) {
          this.handle.innerHTML = `<span class="rangeslider__handle-value">${value}</span>`;

          showTicks(this.range, percent);

          return _self.majDisplay(this.element.id, value);
        }
      });
    }
  }
}

export default ServerAnimation;

if (document.querySelector(".server")) new ServerAnimation();
