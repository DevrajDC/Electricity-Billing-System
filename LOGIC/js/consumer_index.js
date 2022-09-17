function complaintForm(bill_num, meter_num) {
  document.getElementById("bill_num").value = "";   
  document.getElementById("meter_num").value = "";   
  document.getElementById("bill_num").value = bill_num; 
  document.getElementById("meter_num").value = meter_num; 
}

function toggleModal(modalID){
  document.getElementById(modalID).classList.toggle("hidden");
  document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
  document.getElementById(modalID).classList.toggle("flex");
  document.getElementById(modalID + "-backdrop").classList.toggle("flex");
}

function showsuccessbar(prf1, msg, flag) { 
  console.log('a');
  document.getElementById(prf1).style.display="block";
  if(flag) {
    document.getElementById("success_msg").innerHTML=msg;
  } else {
    document.getElementById("err_msg").innerHTML=msg;
  }
  setTimeout(() => {
    document.getElementById(prf1).style.display="none";
  }, 3000);
}

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

function validateConnectionRequest() {
  const meterAddress = document.getElementById("meter-address");
  console.log("VAlidate");

  if (meterAddress.value.length == 0) {
    showError(meterAddress, "Connection Address is required");
    return false;
  } else {
    showError(meterAddress, "");
  }
  return true;
}

function validateComplaint() {
  const summary = document.getElementById("summary");

  if (summary.value.length == 0) {
    showError(summary, "Summary is required");
    return false;
  } else {
    showError(summary, "");
  }
  return true;
}