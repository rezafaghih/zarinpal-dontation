window.addEventListener("load", function(){
<<<<<<< HEAD
    var button = this.document.querySelectorAll(".navbar-buttons button");
    var container = this.document.querySelectorAll("#real-box-container");
    for (let index = 0; index < button.length; index++) {
      button[index].addEventListener("click", function(){
        for (let i = 0; i < button.length; i++) {
          if (button[i].hasAttribute("act")){
            button[i].removeAttribute('act');
          }
        }
        button[index].setAttribute("act", '1');
        for (let i = 0; i < container.length; i++) {
            container[i].style.display="none";
          }
          container[index].style.display="flex";
      })
    }
  })
=======
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

>>>>>>> a27eef6fbb49e4c17752cc70a7e3d1b4078332b9
