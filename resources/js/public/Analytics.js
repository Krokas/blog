class Analytics {
    scriptTag = document.createElement("script");

    constructor() {
        this.init();
    }

    init() {
        console.log("Init Analytics");
        this.loadScript();
    }

    loadScript() {
        this.scriptTag.src =
            "https://apis.google.com/js/client.js?onload=authorize";
        document.head.appendChild(this.scriptTag);
    }
}

export { Analytics };
