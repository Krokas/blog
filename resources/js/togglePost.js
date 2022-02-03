import http from "./http";
import { STATUS } from "./http/consts";

const ACTIONS = {
    PUBLISH: "Publish",
    UNPUBLISH: "Unpublish",
};

const postAPI = http.get("post");

const postToggleButtons = document.querySelectorAll("[data-post-toggle]");

postToggleButtons.forEach((toggleBtn) => {
    toggleBtn.addEventListener("click", (event) => {
        event.preventDefault();
        togglePost(event.target.dataset.postToggle, event.target);
    });
});

const togglePost = async (id, element) => {
    const response = await postAPI.adminToggle(id);
    if (response.status === STATUS.OK) {
        // Display success message
        if (response.data.active !== undefined) {
            switch (response.data.active) {
                case 0:
                    element.innerHTML = ACTIONS.PUBLISH;
                    element.classList.remove("btn-danger");
                    element.classList.add("btn-success");
                    break;
                case 1:
                    element.innerHTML = ACTIONS.UNPUBLISH;
                    element.classList.remove("btn-success");
                    element.classList.add("btn-danger");
                    break;
            }
        }
    }
};
