document.addEventListener("DOMContentLoaded", () => {
    if (!is_login_valid()) {
        window.location.href = "http://localhost:80/html/login.html"
    }
    alert("Login validado! ta safe patrão")
});

function is_login_valid() {
    const date = get_login_expires_date();
    if (date == null) return false;
    const formatted_date = new Date(format_date(date));
    return formatted_date > new Date()
}

function get_login_expires_date() {
    const all_cookies = document.cookie.split("; ");

    for (let cookie of all_cookies) {
        const [key, value] = cookie.split("=");
        if (key === "login_expires_date") return decodeURIComponent(value);
    }

    return null;
}

function format_date(date) {
    return new Date(date.replace(" ", "T"))
}