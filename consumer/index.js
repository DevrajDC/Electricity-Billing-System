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