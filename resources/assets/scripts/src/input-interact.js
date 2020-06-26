let triggerOnce = false;

window.addEventListener("message", event => {
  if (
    event.data.type === "hsFormCallback" &&
    event.data.eventName === "onFormReady" &&
    !triggerOnce
  ) {
    const forms = document.querySelectorAll(".entry__content .hbspt-form");

    let labels = [...document.querySelectorAll(".hbspt-form label")];

    labels.map(label => {
      label.classList.add("hs-label");
    });

    if (forms && forms.length > 0) {
      const textFields = [
        ...document.querySelectorAll(
          ".entry__content .hbspt-form .hs-fieldtype-text, .hbspt-form .hs-fieldtype-number"
        )
      ];

      textFields.map(field => {
        field.querySelector("input").addEventListener("focus", () => {
          field.classList.add("hs-field--focused");
        });

        field.querySelector("input").addEventListener("blur", () => {
          field.classList.remove("hs-field--focused");
        });

        field.querySelector("input").addEventListener("change", ev => {
          if (ev.target.value.length === 0) {
            field.classList.remove("hs-field--not-empty");
          } else {
            field.classList.add("hs-field--not-empty");
          }
        });
      });
    }

    triggerOnce = true;
  }
});
