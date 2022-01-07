import tinymce from "tinymce";
import "tinymce/themes/silver/theme";
import "tinymce/icons/default/icons";
import "tinymce/skins/ui/oxide/skin.min.css";
import "tinymce/skins/ui/oxide/content.min.css";
import "tinymce/skins/content/default/content.css";
import "tinymce/plugins/autoresize/plugin";

tinymce.init({
    selector: '[name="body"]',
    theme: "silver",
    menubar: false,
    plugins: "autoresize",
    min_height: 700,
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
