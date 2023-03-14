window.addEventListener("load", function(){
  var container = this.document.querySelectorAll(".right-side-container");
  var nav_buttons = document.querySelectorAll("nav button");
  if (nav_buttons != undefined){
    for (let index = 0; index < nav_buttons.length; index++) {
      nav_buttons[index].addEventListener("click", function(){
        for (let index = 0; index < nav_buttons.length; index++) {
          nav_buttons[index].removeAttribute("act");
        }
        for (let index = 0; index < container.length; index++) {
          container[index].style.display="none";        
        }
        container[index].style.display="flex";        
          
        nav_buttons[index].setAttribute("act", true);
      })
    }
  }
})

