import "./editor";
import "./slugify";

const postSaveCta = document.querySelector("#post-save-cta");
const postForm = document.querySelector("form#post");

if (postSaveCta && postForm) {
    postSaveCta.addEventListener("click", (event) => {
        event.preventDefault();
        postForm.submit();
    });
}
