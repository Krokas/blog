import tinymce from "tinymce";
import "tinymce/themes/silver/theme";
import "tinymce/icons/default/icons";
import "tinymce/skins/ui/oxide/skin.min.css";
import "tinymce/skins/ui/oxide/content.min.css";
import "tinymce/skins/content/default/content.css";
import "tinymce/plugins/autoresize/plugin";
import "tinymce/plugins/link/plugin";
import "tinymce/plugins/code/plugin";
import { getImageGallery } from "./images";

const styleFormats = [
    {
        title: "Headings",
        items: [
            { title: "Heading 1", format: "h1" },
            { title: "Heading 2", format: "h2" },
            { title: "Heading 3", format: "h3" },
            { title: "Heading 4", format: "h4" },
            { title: "Heading 5", format: "h5" },
            { title: "Heading 6", format: "h6" },
        ],
    },
    {
        title: "Inline",
        items: [
            { title: "Bold", format: "bold" },
            { title: "Italic", format: "italic" },
            { title: "Underline", format: "underline" },
            { title: "Strikethrough", format: "strikethrough" },
            { title: "Superscript", format: "superscript" },
            { title: "Subscript", format: "subscript" },
            { title: "Code", format: "code" },
        ],
    },
    {
        title: "Blocks",
        items: [
            { title: "Paragraph", format: "p" },
            { title: "Blockquote", format: "blockquote" },
            { title: "Div", format: "div" },
            { title: "Pre", format: "pre" },
        ],
    },
    {
        title: "Align",
        items: [
            { title: "Left", format: "alignleft" },
            { title: "Center", format: "aligncenter" },
            { title: "Right", format: "alignright" },
            { title: "Justify", format: "alignjustify" },
        ],
    },
];

tinymce.init({
    selector: "textarea",
    theme: "silver",
    menubar: false,
    plugins: "autoresize link custom-image code",
    toolbar:
        "undo redo | styleselect | bold italic link | alignleft aligncenter alignright alignjustify | outdent indent | custom-image code",
    min_height: 200,
    style_formats: styleFormats,
    default_link_target: "_blank",
    setup: (editor) => {
        editor.on("keyup", () => {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(doneTyping, doneTypingInterval);
        });

        editor.on("keydown", () => {
            clearTimeout(typingTimer);
        });

        editor.on("click", () => {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(doneTyping, doneTypingInterval);
        });
    },
    content_css: "/css/editor.css",
});

tinymce.PluginManager.add("custom-image", (editor, url) => {
    editor.ui.registry.addButton("custom-image", {
        tooltip: "Uploaded image",
        text: null,
        icon: "image",
        onAction: () => {
            getImageGallery(tinymce);
        },
    });
});

var typingTimer;
var doneTypingInterval = 5000;

const doneTyping = () => {
    console.log("done");
};
