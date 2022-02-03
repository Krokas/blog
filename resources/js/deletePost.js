import http from "./http";
import { STATUS } from "./http/consts";

const CONFIRM_MESSAGE = "Do you really want to delete this post?";

const postAPI = http.get("post");

const postDeleteButtons = document.querySelectorAll("[data-delete]");

postDeleteButtons.forEach((toggleBtn) => {
    toggleBtn.addEventListener("click", (event) => {
        event.preventDefault();
        if (confirm(CONFIRM_MESSAGE)) deletePost(event.target.dataset.delete);
    });
});

const deletePost = async (id) => {
    const response = await postAPI.adminDelete(id);
    console.log(response);
    if (response.status === STATUS.OK) {
        location.reload();
    }
};
