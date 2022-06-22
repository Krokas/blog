import http from "./http";
const imageAPI = http.get("image");
import { STATUS } from "./http/consts";

export const getImageGallery = async (tinymce) => {
    const images = await imageAPI.getAll();
    if (images.status === STATUS.OK) {
        const htmlComponent = createImagesView(images.data.data);
        tinymce.activeEditor.windowManager.open({
            title: "Images",
            body: {
                type: "panel",
                items: [
                    {
                        type: "htmlpanel",
                        html: htmlComponent.innerHTML,
                    },
                ],
            },
            buttons: [
                {
                    type: "submit",
                    text: "Ok",
                },
            ],
            onSubmit() {
                const formElement = document.getElementById(
                    "uploaded-images-form"
                );
                const formData = new FormData(formElement);
                const imageUrl = formData.get("image");
                const imageAlt = formData.get("image-alt");
                if (imageUrl) {
                    const container = document.createElement("div");
                    const imageContainer = document.createElement("div");
                    imageContainer.classList.add("post__image-container");
                    const imageElement = document.createElement("img");
                    imageElement.src = imageUrl;
                    imageElement.alt = imageAlt;
                    imageContainer.append(imageElement);
                    container.append(imageContainer);
                    const extraParagraphElement = document.createElement("p");
                    container.append(extraParagraphElement);
                    tinymce.activeEditor.insertContent(container.innerHTML);
                    tinymce.activeEditor.windowManager.close();
                } else {
                    tinymce.activeEditor.windowManager.alert(
                        "Image is not selected"
                    );
                }
            },
        });
    }
};

const createImagesView = (images) => {
    let panel = document.createElement("div");
    let formElement = document.createElement("form");
    formElement.id = "uploaded-images-form";

    images.forEach((image) => {
        const imageContainer = document.createElement("div");
        const imageElement = document.createElement("img");
        const radioElement = document.createElement("input");
        const altElement = document.createElement("input");
        const radioContainer = document.createElement("div");
        const imageSrc = `/storage/images/${image.path}`;
        radioElement.type = "radio";
        radioElement.name = "image";
        radioElement.value = imageSrc;
        radioElement.ariaLabel = `select image titeled: ${image.title}`;
        radioElement.id = `image-${image.id}`;
        radioContainer.style.position = "absolute";
        radioContainer.style.bottom = "5px";
        radioContainer.style.right = "5px";
        radioContainer.append(radioElement);

        altElement.type = "hidden";
        altElement.name = "image-alt";
        altElement.value = image.title;
        imageContainer.append(altElement);

        imageElement.alt = image.title;
        imageElement.src = imageSrc;
        imageContainer.append(imageElement);
        imageContainer.append(radioContainer);
        imageContainer.style.width = "30%";
        imageContainer.style.position = "relative";
        imageElement.style.width = "100%";
        imageElement.style.height = "auto";
        formElement.append(imageContainer);
    });

    panel.append(formElement);
    return panel;
};
