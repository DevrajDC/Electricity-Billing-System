//hide div with id sub-menu-1 when click on button

var toggleitem=0;
function showhide(num)
{
    if(toggleitem==0){
    document.getElementById("sub-menu-"+num).style.display = "none";
    toggleitem=0;
    }
else{
    console.log("show");
 document.getElementById("sub-menu-"+num).style.display = "block";
 toggleitem=1;
}
}