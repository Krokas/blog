class Cookie {
    constructor() {
        this.cookies = this.parseCookies();
        console.log(this.cookies);

        this.get = this.get.bind(this);
    }

    parseCookies() {
        return document.cookie.split(";").map((value) =>
            value.split("=").reduce((key, value) => {
                return {
                    key: decodeURIComponent(key.trim()),
                    value: decodeURIComponent(value.trim()),
                };
            })
        );
    }

    get(name) {
        return this.cookies.find((cookie) => cookie.key === name);
    }
}

window.cookie = new Cookie();
