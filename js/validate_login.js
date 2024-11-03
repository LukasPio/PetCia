if (localStorage.getItem("email") == null || localStorage.getItem("password") == null)
    window.location.href = "/index.html"

setInterval(() => {
if (localStorage.getItem("email") == null || localStorage.getItem("password") == null)
    window.location.href = "/index.html"
}, 300000)