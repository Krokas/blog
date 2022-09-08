import { createApp } from "vue";

import { PrivacyModal } from "./components/PrivacyModal";
import Cookie from "./services/cookie";
//@ts-ignore
window.cookie = new Cookie();

const app = createApp({});

app.component("PrivacyModal", PrivacyModal);

app.mount("#app");
