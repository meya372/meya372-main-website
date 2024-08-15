const hide_on_small = document.getElementsByClassName("hide-on-small");
const x = document.getElementById("x");
const search_icon = document.getElementById("search_icon");
let menu_hidden = true;
const nav_ul = document.getElementById("nav-ul");

x.addEventListener("click", () => {
  if (menu_hidden) {
    x.innerText = "X";
    nav_ul.style.display = "block";
    for (let i = 0; i < hide_on_small.length; i++) {
      hide_on_small[i].style.display = "block";
      x.style.display = "block";
      x.style.fontSize = "1.3rem";
      search_icon.style.display = "none";
    }
    menu_hidden = false;
  } else {
    x.innerText = "☰";
    nav_ul.style.display = "flex";
    for (let i = 0; i < hide_on_small.length; i++) {
      hide_on_small[i].style.display = "none";
      x.style.display = "inline-block";
      x.style.fontSize = "1rem";
      x.style.paddingTop = "5px";
      search_icon.style.display = "inline-block";
    }
    menu_hidden = true;
  }
});
