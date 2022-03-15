class Cookie {
    constructor() {
        this.cookies = this.parseCookies();

        this.get = this.get.bind(this);
        this.set = this.set.bind(this);
        this.delete = this.delete.bind(this);
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

    set(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
            expires = `; expires=${date.toUTCString()}`;
        }
        document.cookie = `${name}=${value || ""}${expires}; path=/`;
        this.cookies = this.parseCookies();
    }

    delete(name) {
        document.cookie = `${name}=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;`;
        this.cookies = this.parseCookies();
    }
}

window.cookie = new Cookie();
