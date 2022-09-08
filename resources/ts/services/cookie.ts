type TCookie = {
    key: string | null;
    value: string | null;
};

class Cookie {
    cookies: TCookie[];
    constructor() {
        this.cookies = this.parseCookies();

        this.get = this.get.bind(this);
        this.setCookie = this.setCookie.bind(this);
        this.delete = this.delete.bind(this);
    }

    parseCookies(): TCookie[] {
        return document.cookie.split(";").map((value: string) => {
            const array = value.split("=");
            return {
                key: array.length ? decodeURIComponent(array[0].trim()) : null,
                value: array.length
                    ? decodeURIComponent(array[1].trim())
                    : null,
            };
        });
    }

    get(name: string): TCookie | undefined {
        return this.cookies.find((cookie) => cookie.key === name);
    }

    setCookie(name: string, value: string, days: number) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
            expires = `; expires=${date.toUTCString()}`;
        }
        document.cookie = `${name}=${value || ""}${expires}; path=/`;
        this.cookies = this.parseCookies();
    }

    delete(name: string) {
        document.cookie = `${name}=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;`;
        this.cookies = this.parseCookies();
    }
}

export default Cookie;
