import { Analytics } from "./Analytics";

const CONSENT = {
    SELECTORS: {
        MODAL: "[data-consent]",
        CTA: {
            ESSENTIAL: "[data-essentials]",
            ANALYTICS: "[data-analytics]",
        },
    },
    CLASSES: {
        VISIBLE: "consent--visible",
    },
    LEVEL: {
        ANALYTICS: "analytics",
        ESSENTIAL: "essential",
    },
};

class Consent {
    constructor() {
        this.init();
    }

    init() {
        this.consentElement = document.querySelector(CONSENT.SELECTORS.MODAL);
        this.consentDate = this.consentElement?.dataset?.consent;
        this.essentialButton = document.querySelector(
            CONSENT.SELECTORS.CTA.ESSENTIAL
        );
        this.analyticsButton = document.querySelector(
            CONSENT.SELECTORS.CTA.ANALYTICS
        );

        if (this.consentElement) {
            if (this.consentDate) {
                this.consentDate = new Date(this.consentDate)
                    .toDateString()
                    .replaceAll(" ", "_");
            }

            this.consentElement.style.visibility = null;
            this.checkConsent();
            this.shouldModalBeDisplayed
                ? this.setConsentElementVisible()
                : this.setConsentElementInvisible();
        } else {
            console.error("Missing consent element!");
        }

        if (!this.analyticsButton) {
            console.error("Missing Analytics consent action.");
        } else {
            this.analyticsButton.addEventListener("click", () => {
                this.setConsentAndCloseModal(CONSENT.LEVEL.ANALYTICS);
            });
        }

        if (!this.essentialButton) {
            console.error("Missing Essential consent action.");
        } else {
            this.essentialButton.addEventListener("click", () => {
                this.setConsentAndCloseModal(CONSENT.LEVEL.ESSENTIAL);
            });
        }
    }

    setConsentElementVisible() {
        this.consentElement.classList.add(CONSENT.CLASSES.VISIBLE);
    }

    setConsentElementInvisible() {
        this.analyticsButton.removeEventListener("click", () => {});
        this.essentialButton.removeEventListener("click", () => {});
        this.consentElement.classList.remove(CONSENT.CLASSES.VISIBLE);
    }

    checkConsent() {
        const privacyDate = window.cookie.get("privacy");
        this.shouldModalBeDisplayed = true;

        if (privacyDate && privacyDate.value === this.consentDate) {
            this.shouldModalBeDisplayed = false;
        }
    }

    setConsentAndCloseModal(level) {
        window.cookie.setCookie("privacy", this.consentDate, 365);
        window.cookie.setCookie("privacy_level", level, 365);
        this.setConsentElementInvisible();

        if (level === CONSENT.LEVEL.ANALYTICS) {
            this.initAnalytics();
        }
    }

    initAnalytics() {
        if (!window.analytics) {
            window.analytics = new Analytics();
        }
    }
}

export { CONSENT };

window.consent = new Consent();
