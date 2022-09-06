//hide div with id sub-menu-1 when click on button
var toggleitem=1;
function showhide(num)
{
    if(toggleitem==0){
    document.getElementById("sub-menu-"+num).style.display = "none";
    toggleitem=1;
    }
    else{
    document.getElementById("sub-menu-"+num).style.display = "block";
    toggleitem=0;
    }
}

