window.addEventListener('load', ()=>{
    if (!("timestamp" in localStorage)){
        localStorage["timestamp"] = Math.floor(Date.now() / 1000)
        return
    }
    const now = Math.floor(Date.now() / 1000)
    if (!(now - localStorage["timestamp"] > 1800 /* 30 minutes */)){
        return
    }
    localStorage.clear()
    if (location.href.endsWith("adminPanel.html")){
        location.href = "login.html"
        return
    }
    return
})