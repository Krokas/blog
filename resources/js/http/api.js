import axios from "axios";

const baseElement = document.querySelector("base");

if (!baseElement) {
    console.error("Missing base tag.");
}

const baseDomain = baseElement.getAttribute("href");
const baseURL = `${baseDomain}/api`;

console.log(baseURL);

export default axios.create({
    baseURL,
});
