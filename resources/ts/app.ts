import { createApp } from "vue";

import { PrivacyModal } from "./components/PrivacyModal";

const app = createApp({});

app.component("PrivacyModal", PrivacyModal);

app.mount("#app");
