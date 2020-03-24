/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
function openNav(){
document.getElementById("mysidenav").style.width="240px";
document.getElementById("main_content").style.left="240px";
}
function closeNav(){
document.getElementById("mysidenav").style.width="0px";
document.getElementById("main_content").style.left="0px";
}