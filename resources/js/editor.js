import tinymce from "tinymce";
import "tinymce/themes/silver/theme";
import "tinymce/icons/default/icons";
import "tinymce/skins/ui/oxide/skin.min.css";
import "tinymce/skins/ui/oxide/content.min.css";
import "tinymce/skins/content/default/content.css";
import "tinymce/plugins/autoresize/plugin";

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
    selector: '[name="body"]',
    theme: "silver",
    menubar: false,
    plugins: "autoresize",
    min_height: 700,
    style_formats: styleFormats,
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
});

var typingTimer;
var doneTypingInterval = 5000;

const doneTyping = () => {
    console.log("done");
};
