const hexToRgb = (hex) => {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result
        ? {
              r: parseInt(result[1], 16),
              g: parseInt(result[2], 16),
              b: parseInt(result[3], 16),
          }
        : null;
};

const getTextColorForBackground = (color) => {
    const rgbColor = hexToRgb(color);
    const luminance =
        (0.299 * rgbColor.r + 0.587 * rgbColor.g + 0.114 * rgbColor.b) / 255;

    let textColor;
    if (luminance > 0.5) {
        textColor = "--text-dark";
    } else {
        textColor = "--text-light";
    }

    return textColor;
};

const elements = document.querySelectorAll(".average-color");
elements.forEach((element) => {
    const backgroundColor = element.style.getPropertyValue("--average-color");
    if (backgroundColor) {
        const textColor = getTextColorForBackground(backgroundColor);
        element.style.setProperty("color", `var(${textColor})`);
    }
    console.log(element, element.style.getPropertyValue("--average-color"));
});
