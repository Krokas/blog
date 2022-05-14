// require("./bootstrap");
import "./public/Cookie";
import "./public/Consent";
import { CONSENT } from "./public/Consent";
import { Analytics } from "./public/Analytics";

const privacy = window.cookie.get("privacy_level");
if (privacy && privacy.value === CONSENT.LEVEL.ANALYTICS) {
    window.analytics = new Analytics();
}
