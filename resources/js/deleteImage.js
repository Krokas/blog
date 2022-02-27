import http from "./http";
import { STATUS } from "./http/consts";

const imageAPI = http.get("image");

const CONFIRM_MESSAGE = "Do you really want to delete this image?";

const imageDeleteButtons = document.querySelectorAll("[data-delete-image]");

imageDeleteButtons.forEach((toggleBtn) => {
    toggleBtn.addEventListener("click", (event) => {
        event.preventDefault();
        if (confirm(CONFIRM_MESSAGE))
            deleteImage(event.target.dataset.deleteImage);
    });
});

const deleteImage = async (id) => {
    const response = await imageAPI.adminDelete(id);
    if (response.status === STATUS.OK) {
        location.reload();
    }
};
