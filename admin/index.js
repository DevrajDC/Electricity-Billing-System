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

// validation

const form = document.getElementById('f1');
const email = document.getElementById('email2');
const password = document.getElementById('password2');

//Show input error messages
function showError(input, message) {
    const formControl = input.parentElement;
    formControl.className = 'form-control error';
    const small = formControl.querySelector('small');
    small.innerText = message;
}

//show success colour
function showSucces(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-control success';
}

//check email is valid
function checkEmail(input) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(re.test(input.value.trim())) {
        showSucces(input)
    }else {
        showError(input,'Email is not invalid');
    }
}

//checkRequired fields
function checkRequired(inputArr) {
    inputArr.forEach(function(input){
        if(input.value.trim() === ''){
            showError(input,`${getFieldName(input)} is required`)
        }else {
            showSucces(input);
        }
    });
}

//check input Length
function checkLength(input, min ,max) {
    if(input.value.length < min) {
        showError(input, `${getFieldName(input)} must be at least ${min} characters`);
    }else if(input.value.length > max) {
        showError(input, `${getFieldName(input)} must be les than ${max} characters`);
    }else {
        showSucces(input);
    }
}

//get FieldName
function getFieldName(input) {
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

// // check passwords match
// function checkPasswordMatch(input1, input2) {
//     if(input1.value !== input2.value) {
//         showError(input2, 'Passwords do not match');
//     }
// }

//Event Listeners
form.addEventListener('submit',function(e) {
    e.preventDefault();

    checkRequired([email, password]);
    checkLength(password,6,25);
    checkEmail(email);
}); 

const form2 = document.getElementById('l2');
form2.addEventListener('submit',function(e) {
  e.preventDefault();

  checkRequired([document.getElementById('password1'), document.getElementById('email1')]);
  checkLength(document.getElementById('password1'),6,25);
  checkLength(document.getElementById('phone'),10,10);
  checkEmail(document.getElementById('email1'));
}); 

