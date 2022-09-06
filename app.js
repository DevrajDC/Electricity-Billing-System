//hide div with id sub-menu-1 when click on button

var toggleitem=1;
function showhide(num)
{
    console.log(num);
    if(toggleitem==1){
 document.getElementById("sub-menu-"+num).style.display = "none";
    toggleitem=0;
}
else{
 document.getElementById("sub-menu-"+num).style.display = "block";
 toggleitem=1;
}}