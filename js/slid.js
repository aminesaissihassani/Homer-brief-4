
var myIndex = 0;
slide();

function slide() {
  var i;
  var x = document.getElementsByClassName("img1");
  var y = document.getElementsByClassName("img2");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "block";  
    y[i].style.display = "block";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "none"; 
  y[myIndex-1].style.display = "none"; 
  setTimeout(slide, 2000); 
}