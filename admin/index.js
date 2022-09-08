
function toggleModal(modalID){
    document.getElementById(modalID).classList.toggle("hidden");
    document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
    document.getElementById(modalID).classList.toggle("flex");
    document.getElementById(modalID + "-backdrop").classList.toggle("flex");
  }

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
    document.getElementById('hh2').innerHTML=p2
}
function navcolor(j1,j2,j3)
{
    var t="menu3 bg-indigo-100 border-indigo-500 text-indigo-600 whitespace-nowrap pt-2 pb-2 px-4 border-b-2 font-medium text-sm";
    var j="menu2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pt-2 pb-2 px-4 border-b-2 font-medium text-sm";
    document.getElementById(j1).className=t;
    document.getElementById(j2).className=j;
    document.getElementById(j3).className=j;
}