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

function changeslide(pagename1,pagemame2,pagename3)
{
    document.getElementById(pagename1).style.display = "block";
    document.getElementById(pagemame2).style.display = "none";
    document.getElementById(pagename3).style.display = "none";
}
function changename(p1,p2)
{
    document.getElementById('hh1').innerHTML=p1
    document.getElementById('hh1').innerHTML=p1
}