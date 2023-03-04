window.addEventListener("load", function(){
  var nav_buttons = document.querySelectorAll("nav button");
  if (nav_buttons != undefined){
    for (let index = 0; index < nav_buttons.length; index++) {
      nav_buttons[index].addEventListener("click", function(){
        for (let index = 0; index < nav_buttons.length; index++) {
          nav_buttons[index].removeAttribute("act");
        }
        nav_buttons[index].setAttribute("act", true);
      })
    }
  }
})

