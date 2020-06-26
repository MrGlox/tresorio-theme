import lottie from "lottie-web";

const animationContainer = document.querySelector(".hero__data");

if (animationContainer) {
  const animation = lottie.loadAnimation({
    container: animationContainer, // the dom element that will contain the animation
    renderer: "svg",
    loop: false,
    autoplay: false,
    path: animationContainer.dataset.src // the path to the animation json
  });

  animation.addEventListener("DOMLoaded", () => {
    const { markers } = animation.animationData;

    animation.playSegments([markers[0].tm, markers[0].dr], true);
    animation.setSubframe(false);
    animation.addEventListener("complete", () => {
      animation.loop = true;

      animation.playSegments(
        [markers[1].tm, markers[1].tm + markers[1].dr],
        false
      );
    });
  });
}
