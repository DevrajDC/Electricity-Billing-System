<?php
  include("../../DB/admin/CRUD.php");

  if(session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  if(isset($_GET["action"])) {
    $_GET["action"]();
  }

function getDist() {
  if(isset($_POST['region'])) {
    $region = $_POST['region'];
    echo "<script>console.log('$region');</script>";
    $res = getDistList($region);    
    while($r = $res->fetch_assoc()) {   
      echo "<option value='".$r["distributor_id"]."'>".$r['name']."</option>";
    }
  } 
}

function displayConnRequests() {
  $res = getConnRequests();
  while ($r = $res->fetch_assoc()) {
    echo "
    <tr>
      <td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>
        ".$r["id"]."
      </td>
      <td class='px-6 py-4 whitespace-wrap text-sm text-gray-500'>
        ".$r["address"]."
      </td>
      <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>
        ".$r["region"]."
      </td>
      <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>
        ".$r["phase_id"]."
      </td>
      <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>
        ".$r["conn_type"]."
      </td>
      <td class='px-6 py-4 whitespace-nowrap text-right'>
        <button type='button' onclick='populateUserRequestForm(
         \"".$r['id']."\",
         \"".$r['address']."\", 
         \"".$r['region']."\", 
         \"".$r['phase_id']."\", 
         \"".$r['conn_type']."\"
        ); toggleModal(\"add-meter-modal\")' class='inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500'>
          Approve
        </button>
        <button type='button' onclick='userRequestDeleteForm(\"".$r['id']."\"); toggleModal(\"reject-modal\")' class='inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'>
          Reject
        </button>
      </td>
    </tr>";
  }       
}

function addMeter() {
  $id = $_POST["consumer_id"];
  $meter_no = $_POST["meter-no"];
  $conn_status = $_POST["conn_status"]; 
  $conn_type = $_POST["consumer_conn_type"];
  $conn_date = $_POST["conn_date"];
  $region = $_POST["consumer_region"];
  $address = $_POST["consumer_address"];
  $phase_id = $_POST["consumer_phase_id"];
  $distributor = $_POST["distributor"];
  echo "<script>console.log('HELLEOE');</script>";
  //insert Meter details
  $result = newMeter($meter_no, $id, $conn_status, $conn_type, $conn_date, $region, $address, $phase_id, $distributor);
  
  if ($result == 2) {
    $_SESSION["toast"] = 1;
    $_SESSION["toastMessage"] = "Meter Added Successfully<BR>Request Deleted Successfully"; 
  } else {
    $_SESSION["toast"] = 0;
    if($result == 0) {
      $_SESSION["toastMessage"] = "Error Adding Meter";
    } else {
      $_SESSION["toastMessage"] = "Meter Added Successfully<BR>Error Deleting Meter Request";
    }
  }
   echo "<script>window.location.href='../../UI/admin/index.php';</script>";
}

function deleteUserReq() {
  $id = $_POST["userreq-delete-id"];
  $result = deleteConnReq($id);   
  if ($result) {
    $_SESSION["toast"] = 1;
    $_SESSION["toastMessage"] = "Request Deleted Successfully"; 
  } else {
    $_SESSION["toast"] = 0;
    $_SESSION["toastMessage"] = "Error Deleting Request";
  }
   echo "<script>window.location.href='../../UI/admin/index.php';</script>";
}

function displayComplaints() {
  $result = getComplaintList();
  while($row = $result->fetch_assoc()) {                    
    $bill_id = $row["bill_no"];
    $re = getComplaintAttr($bill_id);
    echo "<tr>
            <form action='../../DB/admin/CRUD.php?action=updateComplaint&complaint_id=".$row["complaint_id"]."&bill_num=".$bill_id."' method='post'>
              <td class='px-6 py-4 whitespace-nowrap'>
                <div class='text-sm font-medium text-gray-900'>
                  ".$row["complaint_id"]."
                </div>
              </td>
              <td class='px-6 py-4 whitespace-nowrap'>
                <div class='text-sm text-gray-900'>
                    <a href='consumerdetails.php?meter_num=".$re['meter_num']."&consumer_name=".$re['name']."&consumer_id=".$re['consumer_id']."&bill=block'>".$row["bill_no"]."</a>
                </div>
              </td>
              <td class='px-6 py-4 whitespace-nowrap'>
                <div class='text-sm text-gray-900'>".$re['name']."</div>
              </td>
              <td class='px-6 py-4 whitespace-wrap text-sm text-gray-500'>
                <div class='text-sm text-gray-900'>
                  ".$row["summary"]."
                </div>
              </td>
              <td class='px-6 py-4 text-sm text-gray-500'>
                <div class='flex justify-center'>
                  <div class='mb-3 xl:w-64'>
                    <select name='Status' class='w-full px-2 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none'>";
                      if($row["status"] == "Pending") { 
                        echo "<option selected value='Pending'>Pending</option>  
                        <option value='Resolved'>Resolved</option>";
                      } else {
                        echo "<option value='Pending'>Pending</option>  
                        <option selected value='Resolved'>Resolved</option>";
                      }
                    echo "</select>
                  </div>
                </div>
              </td>
              <td class='px-6 py-4 whitespace-nowrap text-right text-sm font-medium'>
                <input type='submit' class='text-indigo-600 hover:text-indigo-900' value='Update'>
              </td>
            </form> 
          </tr>";
  }
}

function displayProviders() {
  $result = getProviderList();
  while ($row = $result->fetch_assoc()) {
    $enb = $row["status"] == 'Inactive' ? 'inline-block' : 'none';
    $disb = $row["status"] == 'Inactive' ? 'none' : 'inline-block';
    // echo "<script>console.log('enb: $enb');</script>";
    // echo "<script>console.log('disb: $disb');</script>";
    echo "<tr>
            <td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>
              ".$row["provider_id"]."
            </td>
            <td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>
              ".$row["name"]."
            </td>
            <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>
              ".$row["num_provisions"]."
            </td>
            <td class='px-6 py-4 whitespace-nowrap text-right text-sm font-medium'>
              <button type='button' onclick='providerEditForm(\"".$row["provider_id"]."\", \"".$row['name']."\", \"".$row['num_provisions']."\"); toggleModal(\"add-meter-modal\")' class='inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'>
                Edit
              </button>
              <button style='display: ".$disb.";' type='button' onclick='providerToggleForm(
                \"".$row['provider_id']."\", 
                \"".$row['status']."\", 
                \"Disable\", 
                \"Are you sure you want to Disable this Account?\"); toggleModal(\"Delete-modal\")' class='inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'>Disable</button>
              <button style='display: ".$enb.";' type='button' onclick='providerToggleForm(
                \"".$row['provider_id']."\", 
                \"".$row['status']."\", 
                \"Enable\", 
                \"Are you sure you want to Enable this Account?\"); toggleModal(\"Delete-modal\")' class='inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'>Enable</button>
            </td>
          </tr>";
    }
}

function toggleProvider() {
  //Provider details
  $id = $_POST["provider-disable-id"];
  $status = $_POST["provider-status"];
  // echo "<BR>provider_id: ".$id;
  // echo "<BR>Status: ".$status;
  if($status == "Active") {
    $status = "Inactive";
  } else {
    $status = "Active";
  }
  $result = changeProviderStatus($id, $status);
  if ($result) {
    $_SESSION["toast"] = 1;
    $_SESSION["toastMessage"] = "Provider Status Set as: ".$status; 
  } else {
    $_SESSION["toast"] = 0;
    $_SESSION["toastMessage"] = "Failed to Update Provider";
  }
  echo "<script>window.location.href='../../UI/admin/providers.php';</script>";
}

function editProvider() {
  //Provider details
  // echo "<BR>provider_id: " .$_POST["provider-id"];
  // echo "<BR>Name: " .$_POST["provider-name"];
  // echo "<BR>Provisions: " .$_POST["provisions"];
  
  $p_id = $_POST["provider-id"];
  $name = $_POST["provider-name"];
  $provisions = $_POST["provisions"];
  
  $result = updateProvider($name, $provisions, $p_id);
  if ($result) {
    $_SESSION["toast"] = 1;
    $_SESSION["toastMessage"] = "Provider Updated Successfully"; 
  } else {
    $_SESSION["toast"] = 0;
    $_SESSION["toastMessage"] = "Failed to Update Provider";
  }
  echo "<script>window.location.href='../../UI/admin/providers.php';</script>";
}

function displayDistributors() {
  $result = getDistList();
  while ($row = $result->fetch_assoc()) {
    $enb = $row["status"] == 'Inactive' ? 'inline-block' : 'none';
    $disb = $row["status"] == 'Inactive' ? 'none' : 'inline-block';
    // echo "<script>console.log('enb: $enb');</script>";
    // echo "<script>console.log('disb: $disb');</script>";
    echo "<tr>
      <td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>
        ".$row["distributor_id"]."
      </td>
      <td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>
        ".$row["provider_id"]."
      </td>
      <td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>
        ".$row["name"]."
      </td>
      <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>
        ".$row["region"]."
      </td>
      <td class='px-6 py-4 whitespace-nowrap text-right text-sm font-medium'>
        <button type='button' onclick='distributorEditForm(
          \"".$row['distributor_id']."\", 
          \"".$row['provider_id']."\", 
          \"".$row['name']."\", 
          \"".$row['region']."\"); 
          toggleModal(\"add-meter-modal\")' class='inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'>
          Edit
        </button>
        <button style='display: ".$disb.";' type='button' onclick='distToggleForm(
          \"".$row['distributor_id']."\", 
          \"".$row['status']."\", 
          \"Disable\", 
          \"Are you sure you want to Disable this Account?\"); toggleModal(\"Delete-modal\")' class='inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'>Disable</button>
        <button style='display: ".$enb.";' type='button' onclick='distToggleForm(
          \"".$row['distributor_id']."\", 
          \"".$row['status']."\", 
          \"Enable\", 
          \"Are you sure you want to Enable this Account?\"); toggleModal(\"Delete-modal\")' class='inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'>Enable</button>
      </td>
    </tr>";
  }
}

function toggleDistributor() {
  //Distributor Details
  $id = $_POST["distributor-delete-id"];
  $status = $_POST["distributor-status"];
  // echo "<BR>distributor_id: ".$id;
  // echo "<BR>Status: ".$status;
  if($status == "Active") {
    $status = "Inactive";
  } else {
    $status = "Active";
  }
  $result = changeDistStatus($id, $status);
  if ($result) {
    $_SESSION["toast"] = 1;
    $_SESSION["toastMessage"] = "Distributor Status Set as: ".$status; 
  } else {
    $_SESSION["toast"] = 0;
    $_SESSION["toastMessage"] = "Failed to Update Distributor";
  }
  echo "<script>window.location.href='../../UI/admin/distributors.php';</script>";
}

function getProviders() {
  $result = getProviderList();
  while ($row = $result->fetch_assoc()) {
    echo "<option value='".$row["provider_id"]."'>".$row["name"]."</option>";
  }
}

function editDistributor() {
  //Distributor details
  // echo "<BR>distributor_id: " .$_POST["distributor-id"];
  // echo "<BR>provider_id: " .$_POST["provider-id"];
  // echo "<BR>Name: " .$_POST["name"];
  // echo "<BR>Region: " .$_POST["region"];
  
  $id = $_POST["distributor-id"];
  $p_id = $_POST["provider-id"];
  $name = $_POST["name"];
  $region = $_POST["region"];

  $result = updateDistributor($id, $p_id, $name, $region);
  if ($result) {
    $_SESSION["toast"] = 1;
    $_SESSION["toastMessage"] = "Distributor Updated Successfully"; 
  } else {
    $_SESSION["toast"] = 0;
    $_SESSION["toastMessage"] = "Failed to Update Distributor";
  }
  echo "<script>window.location.href='../../UI/admin/distributors.php';</script>";

}

function displayConnections() {
  $result = getConnections();
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>
              ".$row["consumer_id"]."
            </td>
            <td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>
              ".$row["name"]."
            </td>
            <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>
              ".$row["email"]."
            </td>
            <td class='px-6 py-4 flex gap-12 whitespace-nowrap text-left'>";
              $id = $row["consumer_id"];
              $res = getNumConn($id);
              $num_meters = mysqli_num_rows($res);
              $i = 1;
              while ($r = $res->fetch_assoc()) {
                echo "<a href='consumerdetails.php?meter_num=".$r["meter_num"]."&consumer_name=".$row["name"]."&consumer_id=".$row["consumer_id"]."&bill=none' class='text-indigo-600 text-sm font-bold'>Meter ".$i."</a>";
                $i++;
              }
            echo "</td>
          </tr>";                   
    }                
}

function getData($meter_num, $consumer) {
  $result = [];
  $qd = "SELECT conn_status FROM Meterdata WHERE meter_num = '$meter_num'";
  $res = $GLOBALS['conn']->query($qd);   
  $r = $res->fetch_assoc();
  echo "<script>console.log('Conn_Status: ".$r["conn_status"]."');</script>"; 
  $result["conn_status"] = $r["conn_status"];
  $qd = "SELECT email, phone FROM Users WHERE consumer_id = $consumer";
  $res = $GLOBALS["conn"]->query($qd);
  $r = $res->fetch_assoc();
  $result["email"] = $r["email"];
  $result["phone"] = $r["phone"];
  return $result;
}

function getConnStatus($id) {
  $qd = "SELECT conn_status FROM Meterdata WHERE meter_num = '$id'";
  return $GLOBALS["conn"]->query($qd);
}

function getConsumerData($id) {
  $qd = "SELECT email, phone FROM Users WHERE consumer_id = $id";
  $res = $GLOBALS["conn"]->query($qd);
}

function getConnDetails($meter_id) {
  $qd = "SELECT * FROM meterdata WHERE meter_num = $meter_id";
  $res = $GLOBALS["conn"]->query($qd);
  return $res->fetch_assoc();
}

function displayBillsTab($meter_id, $consumer_name) {
  $qd = "SELECT * FROM bills WHERE meter_num = $meter_id";
  $res = $GLOBALS["conn"]->query($qd);
  while($r = $res->fetch_assoc()) {
    $btn = ($r["stage"] == "Paid") ? 'disabled' : '';
    echo "<tr>
            <form action='../../DB/admin/CRUD.php?action=updateBillData&meter_num=".$meter_id."&consumer_name=".$consumer_name."&consumer_id=".$r["consumer_id"]."&bill_num=".$r["bill_no"]."' method='post'>
              <td class='px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900'>
                ".$r["bill_no"]."
              </td>
              <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'><input type='text' outline='none' name='bill_date' value='".$r["bill_date"]."' class='focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto' style='border:none;'></td>
              <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'><input type='number' outline='none' name='current_read' value='".$r["current_reading"]."' class='focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto' style='border:none;'></td>
              <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>₹<input type='number' outline='none' name='charges' value='".$r["charges"]."' class='focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto' style='border:none;'></td>
              <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'>
                <select name='Status' class='px-2 py-1.5 bg-white border border-solid border-gray-300 rounded'>";
                  if($r["stage"] == "Pending") { 
                    echo "
                  <option selected value='Pending'>Pending</option>
                  <option value='Unpaid'>Unpaid</option>
                  <option value='Paid'>Paid</option>";
                  } elseif($r["stage"] == "Paid") {
                    echo "
                  <option value='Pending'>Pending</option>
                  <option value='Unpaid'>Unpaid</option>
                  <option selected value='Paid'>Paid</option>";
                    } else {
                    echo "
                  <option value='Pending'>Pending</option>
                  <option selected value='Unpaid'>Unpaid</option>
                  <option value='Paid'>Paid</option>";
                    }
              echo"</select>
              </td>
              <td class='px-6 py-4 whitespace-nowrap text-sm text-gray-500'><input type='submit' ".$btn." value='Update' class='h-fit px-2.5 py-1.5  text-xs font-medium rounded  text-indigo-600  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'></td>
            </form>
          </tr>";
  }                          
}

function updateUser() {
  $id = $_GET["meter_num"];
  $con_name = $_GET["consumer_name"];
  $con_id = $_GET["consumer_id"];

  //get meter details
  $name = $_POST["consumer-name"];
  $phone = $_POST["consumer-phone"];
  $email = $_POST["consumer-email"];
  // echo"<br>name: ".$name;
  // echo"<br>phone: ".$phone;
  // echo"<br>email: ".$email;
  // echo"<br>con-id: ".$con_id;

  $result = updateUserData($con_id, $email, $name, $phone);
  if ($result) {
    $_SESSION["toast"] = 1;
    $_SESSION["toastMessage"] = "User Updated Successfully"; 
  } else {
    $_SESSION["toast"] = 0;
    $_SESSION["toastMessage"] = "Failed to Update User";
  }
  echo "<script>window.location.href='../../UI/admin/consumerdetails.php?meter_num=$id&consumer_name=$con_name&consumer_id=$con_id&bill=none';</script>";    
}

function updateMeter() {
  $id = $_GET["meter_num"];
  $con_name = $_GET["consumer_name"];
  $con_id = $_GET["consumer_id"];

  //get meter details
  $consumer_id = $_POST["consumer-id"];
  $conn_status = $_POST["conn_status"];
  $conn_type = $_POST["conn_type"];
  $conn_date = $_POST["conn_date"];
  $region = $_POST["region"];
  $address = $_POST["address"];
  $phase = $_POST["phase_id"];

  $result = updateMeterData($id, $consumer_id, $conn_status, $conn_type, $conn_date, $region, $address, $phase);  
  if ($result) {
    $_SESSION["toast"] = 1;
    $_SESSION["toastMessage"] = "Meter Updated Successfully"; 
  } else {
    $_SESSION["toast"] = 0;
    $_SESSION["toastMessage"] = "Failed to Update Meter";
  }
  echo "<script>window.location.href='../../UI/admin/consumerdetails.php?meter_num=$id&consumer_name=$con_name&consumer_id=$con_id&bill=none';</script>";   
}

function toggleMeter() {
  //Meter details
  echo "<BR>Meter Id: " .$_POST["meter-num"];
  echo "<BR>Meter Status: " .$_POST["conn-status"];
  $id = $_POST["meter-num"];
  $con_name = $_POST["consumer-name"];
  $con_id = $_POST["consumer-id"];
  $status = $_POST["conn-status"];

  $result = updateMeterStatus($id, $status);
  if ($result) {
    $_SESSION["toast"] = 1;
    $_SESSION["toastMessage"] = "Meter Status Updated Successfully"; 
  } else {
    $_SESSION["toast"] = 0;
    $_SESSION["toastMessage"] = "Failed to Update Meter Status";
  }
  echo "<script>window.location.href='../../UI/admin/consumerdetails.php?meter_num=$id&consumer_name=$con_name&consumer_id=$con_id&bill=none';</script>";   
}


function updateBill() {
  updateBillData();
}

?>
