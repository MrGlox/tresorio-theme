import Glide from "@glidejs/glide";

const slider = document.querySelector(".slider--logo .glide");
if (slider) {
  const glide = new Glide(".slider--logo .glide", {
    type: "carousel",
    perView: 6,
    gap: 60,
    breakpoints: {
      600: {
        perView: 1,
        gap: 60
      },
      768: {
        perView: 2
      },
      1024: {
        perView: 4
      }
    }
  });

  const buttonPrev = document.querySelector(".slider--logo .slider__prev");
  if (buttonPrev) {
    buttonPrev.addEventListener("click", () => {
      glide.go("<");
    });
  }

  const buttonNext = document.querySelector(".slider--logo .slider__next");
  if (buttonNext) {
    buttonNext.addEventListener("click", () => {
      glide.go(">");
    });
  }

  glide.on(["mount.before"], () => {
    slider.classList.add("glide--init");
  });

  glide.mount();
}
