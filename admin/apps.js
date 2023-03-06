window.addEventListener("load", function(){
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