/* Toggle Style Switcher */
const styleSwitcherToggle = document.querySelector(".style-switcher-toggler");

styleSwitcherToggle.addEventListener("click", ()=>
{
    document.querySelector(".style-switcher").classList.toggle("open");
}
)

//hide style-switcher on scroll
window.addEventListener("scroll", ()=>
{
    if(document.querySelector(".style-switcher").classList.contains("open"))
    {
        document.querySelector(".style-switcher").classList.remove("open")
    }
}
)

/* Theme Colors  
*/
function setActiveStyle(color) {
    var links = document.querySelectorAll(".alternate-style");
    for (var i = 0; i < links.length; i++) {
      links[i].disabled = true;
      if (links[i].title == color) {
        links[i].disabled = false;
      }
    }
  }