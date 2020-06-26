import Glide from "@glidejs/glide";

const slider = document.querySelector(".slider--content .glide");
const slides = document.querySelectorAll(
  ".slider--content .glide .slider__item"
);

if (slider) {
  const glide = new Glide(".slider--content .glide", {
    perTouch: 1,
    perView: 2,
    gap: 30,
    rewind: false,
    breakpoints: {
      768: {
        perView: 1
      }
    }
  });

  const buttonPrev = document.querySelector(".slider--content .slider__prev");
  if (buttonPrev) {
    buttonPrev.addEventListener("click", () => {
      glide.go("<");
    });
  }

  const buttonNext = document.querySelector(".slider--content .slider__next");
  if (buttonNext) {
    buttonNext.addEventListener("click", () => {
      glide.go(">");
    });
  }

  glide.on(["mount.before", "run.before", "move"], function(ev) {
    const currentIndex = glide.index || 0;

    if (currentIndex === 0) {
      buttonPrev.classList.add("slider__prev--disabled");
      buttonPrev.disabled = true;
      return;
    }

    if (currentIndex === slides.length - 1) {
      buttonNext.classList.add("slider__next--disabled");
      buttonNext.disabled = true;
      return;
    }

    buttonPrev.classList.remove("slider__prev--disabled");
    buttonPrev.disabled = false;
    buttonNext.classList.remove("slider__next--disabled");
    buttonNext.disabled = false;
  });

  glide.on(["mount.before"], () => {
    slider.classList.add("glide--init");
  });

  glide.mount();
}
