const titleInputElement = document.querySelector("input[name=title]");
const slugInputElement = document.querySelector("input[name=slug]");

String.prototype.slugify = function (separator = "-") {
    return this.toString()
        .normalize("NFD") // split an accented letter in the base letter and the acent
        .replace(/[\u0300-\u036f]/g, "") // remove all previously split accents
        .toLowerCase()
        .trim()
        .replace(/[^a-z0-9 ]/g, "") // remove all chars not letters, numbers and spaces (to be replaced)
        .replace(/\s+/g, separator);
};

if (titleInputElement && slugInputElement) {
    console.log(titleInputElement, slugInputElement);

    titleInputElement.addEventListener("input", (_) => {
        slugInputElement.value = titleInputElement.value.slugify();
    });
}
