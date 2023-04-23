var icon = document.getElementById("icon");

if(localStorage.getItem("theme") == null)
{
    localStorage.setItem("theme", "light");
}

let localData = localStorage.getItem("theme");

if(localData == "light")
{
    icon.src = "img/moon.png";
    document.body.classList.remove("dark-theme");
}
else if(localData == "dark")
{
    icon.src = "img/sun.png";
    document.body.classList.add("dark-theme");
}

icon.onclick = function()
{
    document.body.classList.toggle("dark-theme");
    if(document.body.classList.contains("dark-theme"))
    {
        icon.src = "img/sun.png";
        localStorage.setItem("theme", "dark");
    }else
    {
        icon.src = "img/moon.png";
        localStorage.setItem("theme", "light");
    }
}
