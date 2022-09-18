var jQueryScript = document.createElement("script");
jQueryScript.setAttribute(
  "src",
  "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"
);
document.head.appendChild(jQueryScript);

function showsuccessbar(prf1, msg, flag) {
  console.log("a");
  document.getElementById(prf1).style.display = "block";
  if (flag) {
    document.getElementById("success_msg").innerHTML = msg;
  } else {
    document.getElementById("err_msg").innerHTML = msg;
  }
  setTimeout(() => {
    document.getElementById(prf1).style.display = "none";
  }, 3000);
}

function meterToggleForm(
  meter_num,
  consumer_name,
  consumer_id,
  conn_status,
  modal_title,
  modal_message
) {
  document.getElementById("meter-num").value = "";
  document.getElementById("consumer-name").value = "";
  document.getElementById("consumer-id").value = "";
  document.getElementById("conn-status").value = "";
  document.getElementById("modal-title").innerHTML = "";
  document.getElementById("modal-message").innerHTML = "";

  document.getElementById("meter-num").value = meter_num;
  document.getElementById("consumer-name").value = consumer_name;
  document.getElementById("consumer-id").value = consumer_id;
  document.getElementById("conn-status").value = conn_status;
  document.getElementById("modal-title").innerHTML = modal_title;
  document.getElementById("modal-message").innerHTML = modal_message;
}

//populate data to form on click of edit button using javascript
function populateUserRequestForm(
  consumer_id,
  address,
  region,
  phase_id,
  conn_type
) {
  // populate id to hidden field to value
  document.getElementById("consumer-id").value = 0;
  document.getElementById("consumer-address").value = "";
  document.getElementById("consumer-region").value = "";
  document.getElementById("consumer-phase_id").value = "";
  document.getElementById("consumer-conn_type").value = "";

  {
    $.ajax({
      type: "post",
      url: "../../LOGIC/admin/admin.php?action=getDist",
      data: {
        region: region,
      },
      success: function (response) {
        document.getElementById("distributor").innerHTML = "";
        console.log(response);
        document.getElementById("distributor").innerHTML = response;
      },
    });
  }

  document.getElementById("consumer-id").value = consumer_id;
  document.getElementById("consumer-address").value = address;
  document.getElementById("consumer-region").value = region;
  document.getElementById("consumer-phase_id").value = phase_id;
  document.getElementById("consumer-conn_type").value = conn_type;
}

function userRequestDeleteForm(data) {
  document.getElementById("userreq-delete-id").value = "";
  document.getElementById("userreq-delete-id").value = data;
}

//populate data to form on click of edit button using javascript
function distributorEditForm(data1, data2, data3, data4) {
  // populate id to hidden field to value
  document.getElementById("distributor-id").value = "";
  document.getElementById("provider-id").value = "";
  document.getElementById("name").value = "";
  document.getElementById("region").value = "";

  document.getElementById("distributor-id").value = data1;
  document.getElementById("provider-id").value = data2;
  document.getElementById("name").value = data3;
  document.getElementById("region").value = data4;
}

//populate data to form on click of edit button using javascript
function distributorDeleteForm(data) {
  // populate id to hidden field to value
  document.getElementById("distributor-delete-id").value = "";
  document.getElementById("distributor-delete-id").value = data;
}

//populate data to form on click of edit button using javascript
function providerEditForm(data1, data2, data3) {
  // populate id to hidden field to value
  document.getElementById("provider-id").value = "";
  document.getElementById("provider-name").value = "";
  document.getElementById("provisions").value = "";

  document.getElementById("provider-id").value = data1;
  document.getElementById("provider-name").value = data2;
  document.getElementById("provisions").value = data3;
}

//populate data to form on click of edit button using javascript
function providerToggleForm(provider_id, status, modal_title, modal_message) {
  // populate id to hidden field to value
  document.getElementById("provider-disable-id").value = 0;
  document.getElementById("provider-status").value = "";
  document.getElementById("modal-title").innerHTML = "";
  document.getElementById("modal-message").innerHTML = "";

  document.getElementById("provider-disable-id").value = provider_id;
  document.getElementById("provider-status").value = status;
  document.getElementById("modal-title").innerHTML = modal_title;
  document.getElementById("modal-message").innerHTML = modal_message;
}

function distToggleForm(dist_id, status, modal_title, modal_message) {
  // populate id to hidden field to value
  document.getElementById("distributor-diable-id").value = 0;
  document.getElementById("distributor-status").value = "";
  document.getElementById("modal-title").innerHTML = "";
  document.getElementById("modal-message").innerHTML = "";

  document.getElementById("distributor-diable-id").value = dist_id;
  document.getElementById("distributor-status").value = status;
  document.getElementById("modal-title").innerHTML = modal_title;
  document.getElementById("modal-message").innerHTML = modal_message;
}

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
  } else {
    document.getElementById("sub-menu-" + num).style.display = "block";
    toggleitem = 0;
  }
}

function changeslide(pagename1, pagemame2, pagename3) {
  document.getElementById(pagename1).style.display = "block";
  document.getElementById(pagemame2).style.display = "none";
  if (pagename3 != "")
    document.getElementById(pagename3).style.display = "none";
}
function changename(p1, bt1, bt2, bt3) {
  document.getElementById("hh1").innerHTML = p1;
  document.getElementById(bt1).style.display = "block";
  document.getElementById(bt2).style.display = "none";
  document.getElementById(bt3).style.display = "none";
}
function navcolor(j1, j2, j3, style1, style2) {
  document.getElementById(j1).className = style1;
  document.getElementById(j2).className = style2;
  if (j3 != "") document.getElementById(j3).className = style2;
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
var imagesbg = Array(
  "url(https://paytmblogcdn.paytm.com/wp-content/uploads/2021/07/picked-ElectricityBill_39_How-to-Change-Name-in-Electricity-Bill-800x500.jpg)",
  "url(https://www.edx.org/static/6ff7a7d18d6e835f4608aefcd96e25ae/learn_electricity.jpg)",
  "url(https://sites.google.com/a/thapar.edu/pee-107/_/rsrc/1504180556705/home/tvss-lightning.jpg?height=266&width=400)"
);
setInterval(() => {
  document.getElementById("img").style.backgroundImage = imagesbg[i];
  i++;
  if (i == 3) {
    i = 0;
  }
}, 3000);

//Show input error messages
function showError(input, message) {
  const formControl = input.parentElement;
  formControl.className = "form-control error";
  const small = formControl.querySelector("small");
  small.innerText = message;
}

//get FieldName
function getFieldName(input) {
  return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

function validatelogin() {
  console.log("login");
  const email = document.getElementById("email");
  const password = document.getElementById("password");
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (!email.value.match(mailformat)) {
    showError(email, "Email is not valid");
    return false;
  } else {
    showError(email, "");
  }

  if (password.value.length < 6) {
    showError(password, "Password must be at least 6 characters");
    return false;
  } else {
    showError(password, "");
  }
  return true;
}

function validateReg() {
  console.log("validate");
  const email = document.getElementById("email1");
  const name = document.getElementById("name");
  const password = document.getElementById("password1");
  const phone = document.getElementById("phone");
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (!email.value.match(mailformat)) {
    showError(email, "Email is not valid");
    return false;
  } else {
    showError(email, "");
  }
  if (name.value.length < 3) {
    showError(name, "Name must be at least 3 characters");
    return false;
  } else {
    showError(name, "");
  }
  if (phone.value.length < 10 || phone.value.length > 10) {
    showError(phone, "Phone must be at 10 digits");
    return false;
  } else {
    showError(phone, "");
  }
  if (password.value.length < 6) {
    showError(password, "Password must be at least 6 characters");
    return false;
  } else {
    showError(password, "");
  }
  return true;
}

//validate add meter form
function validateAddMeter() {
  const meterNumber = document.getElementById("meter-no");
  const conDate = document.getElementById("conn_date");
  if (meterNumber.value.length === 0) {
    showError(meterNumber, "please enter meter number");
    return false;
  } else {
    showError(meterNumber, "");
  }
  if (conDate.value.length === 0) {
    showError(conDate, "please enter connection date");
    return false;
  } else {
    showError(conDate, "");
  }
  return true;
}

//validate edit distributor
function validateEditDistributor() {
  const name = document.getElementById("name");
  const region = document.getElementById("region");

  if (name.value.length === 0) {
    showError(name, "please enter name");
    return false;
  } else {
    showError(name, "");
  }

  if (region.value.length === 0) {
    showError(region, "please enter region");
    return false;
  } else {
    showError(region, "");
  }

  return true;
}

function validateEditProvider() {
  const provider_name = document.getElementById("provider-name");
  const provisions = document.getElementById("provisions");

  if (provider_name.value.length === 0) {
    showError(provider_name, "please enter provider name");
    return false;
  } else {
    showError(provider_name, "");
  }

  if (provisions.value.length === 0) {
    showError(provisions, "please enter provisions");
    return false;
  } else {
    showError(provisions, "");
  }
  return true;
}
