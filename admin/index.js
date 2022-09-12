function toggleModal(modalID) {
  document.getElementById(modalID).classList.toggle("hidden");
  document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
  document.getElementById(modalID).classList.toggle("flex");
  document.getElementById(modalID + "-backdrop").classList.toggle("flex");
}

//hide div with id sub-menu-1 when click on button
var toggleitem = 1;
function showhide(num) {
  if (toggleitem == 0) {
      document.getElementById("sub-menu-" + num).style.display = "none";
      toggleitem = 1;
  }
  else {
      document.getElementById("sub-menu-" + num).style.display = "block";
      toggleitem = 0;
  }
}

function changeslide(pagename1, pagemame2, pagename3) {

  document.getElementById(pagename1).style.display = "block";
  document.getElementById(pagemame2).style.display = "none";
  if (pagename3 != '')
      document.getElementById(pagename3).style.display = "none";
}
function changename(p1, bt1, bt2 ,bt3) {
  document.getElementById('hh1').innerHTML = p1;
  document.getElementById(bt1).style.display= 'block';
  document.getElementById(bt2).style.display= 'none';
  document.getElementById(bt3).style.display= 'none';
}
function navcolor(j1, j2, j3,style1,style2) {
  document.getElementById(j1).className = style1;
  document.getElementById(j2).className = style2;
  if (j3 != '')
      document.getElementById(j3).className = style2;
}


//  function screenchange()
//  { 
//     console.log('a');
//    var imagesbg=Array("url(../assets/Electricity.jpg)","url(../assets/OIP.jpg)");
//    console.log('a');
//    for(var i=0;i<imagesbg.length;i++){
//     console.log(imagesbg[i]);
//     setTimeout(,3000);
// }
var i = 0;
var imagesbg = Array("url(../assets/Electricity.jpg)", "url(https://images.unsplash.com/photo-1616763355603-9755a640a287?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80)");
setInterval(() => { console.log(document.getElementById('img').style.backgroundImage); document.getElementById('img').style.backgroundImage = imagesbg[i]; i++; if(i==2){i=0;} }, 3000);