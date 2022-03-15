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
};

class Consent {
    constructor() {
        this.init();
    }

    init() {
        this.consentElement = document.querySelector(CONSENT.SELECTORS.MODAL);
        this.essentialButton = document.querySelector(
            CONSENT.SELECTORS.CTA.ESSENTIAL
        );
        this.analyticsButton = document.querySelector(
            CONSENT.SELECTORS.CTA.ANALYTICS
        );

        if (!this.analyticsButton) {
            console.error("Missing Analytics consent action.");
        }

        if (!this.essentialButton) {
            console.error("Missing Essential consent action.");
        }

        if (this.consentElement) {
            this.consentElement.style.visibility = null;
            this.getCookies();
            this.setConsentElementVisible();
        } else {
            console.error("Missing consent element!");
        }
    }

    setConsentElementVisible() {
        this.consentElement.classList.add(CONSENT.CLASSES.VISIBLE);
    }

    setConsentElementInvisible() {
        this.consentElement.classList.remove(CONSENT.CLASSES.VISIBLE);
    }

    getCookies() {
        console.log(window.cookie.get("XSRF-TOKEN"));
    }
}

window.consent = new Consent();
