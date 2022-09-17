<?php
  if(session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  include("../../DB/dbConnection.php");

  //Call function based on action set in url
  if(isset($_GET["action"])) {
    $_GET["action"]();
  }

  function getConnRequests() {
    $qc = "SELECT * FROM consumerrequest";
    $res = $GLOBALS['conn']->query($qc);
    return $res;
  }

  function getDistList($region = "") {
    if($region == "") {
      $qc = "SELECT * FROM distributor";
    } else {
      $qc = "SELECT name, distributor_id FROM distributor where region = '$region'";
    }
    return $GLOBALS['conn']->query($qc);
  }

  function newMeter($meter_no, $id, $conn_status, $conn_type, $conn_date, $region, $address, $phase_id, $distributor) {
    $status = 0;
    $q = "INSERT INTO Meterdata VALUES ($meter_no, $id, '$conn_status', '$conn_type', '$conn_date', '$region', '$address', '$phase_id', $distributor)";
    echo "<script>console.log('".$q."');</script>";
    if ($GLOBALS['conn']->query($q) === TRUE) {
      $status = 1;
      $res = deleteUserReq($id);   
      if($res) {
        $status = 2;
      }
    } 
    return $status;
  }

  function deleteConnReq($id) {
    $q = "DELETE FROM consumerrequest WHERE id = '$id'";
    if ($GLOBALS['conn']->query($q) === TRUE) {
      return TRUE;  
    } 
    return FALSE;
  }

  function getComplaintList() {
    $quer = "SELECT * FROM complaints ORDER BY complaint_id ASC";
    return $GLOBALS['conn']->query($quer);
  }

  function getComplaintAttr($bill_id) {
    $result = [];
    $qr = "SELECT meter_num, consumer_id FROM bills WHERE bill_no = $bill_id;";
    $res = $GLOBALS['conn']->query($qr);
    $re = $res->fetch_assoc();
    $id = $re["consumer_id"];
    $result["consumer_id"] = $re["consumer_id"];
    $result["meter_num"] = $re["meter_num"];
    $qr = "SELECT name FROM users WHERE consumer_id = $id;";
    $res = $GLOBALS['conn']->query($qr);
    $re = $res->fetch_assoc();    
    $result["name"] = $re["name"];
    return $result;
  }

  function getProviderList() {
    $quer = "SELECT * FROM provider";
    return $GLOBALS['conn']->query($quer);
  }

  function changeProviderStatus($id, $status) {
    $q = "UPDATE provider SET status = '$status' WHERE provider_id = $id";
    if ($GLOBALS['conn']->query($q) === TRUE) {
        return TRUE;  
    } 
    return FALSE;  
  }

  function updateProvider($name, $provisions, $p_id) {
    $q = "UPDATE provider SET name = '$name', num_provisions = '$provisions' WHERE provider_id = '$p_id'";
    if ($GLOBALS['conn']->query($q) === TRUE) {
      return TRUE;
    }
    return FALSE;
  }

  function changeDistStatus($id, $status) {
    $q = "UPDATE distributor SET status = '$status' WHERE distributor_id = $id";
    if ($GLOBALS['conn']->query($q) === TRUE) {
      return TRUE;  
    } 
    return FALSE;  
  }

  function updateDistributor($id, $p_id, $name, $region) {
    $id = $_POST["distributor-id"];
    $p_id = $_POST["provider-id"];
    $name = $_POST["name"];
    $region = $_POST["region"];

    $q = "UPDATE distributor SET provider_id = '$p_id', name = '$name', region = '$region' WHERE distributor_id = '$id'";
    if ($GLOBALS['conn']->query($q) === TRUE) {
      return TRUE;
    }
    return FALSE;
  }

  function getConnections() {    
    $quer = "SELECT * FROM Users WHERE consumer_id IN (SELECT consumer_id FROM meterdata)";
    return $GLOBALS['conn']->query($quer);
  }

  function getNumConn($id) {
    $qr = "SELECT meter_num FROM meterdata WHERE consumer_id = $id";
    return $GLOBALS['conn']->query($qr);          
  }

  function updateUserData($con_id, $email, $name, $phone) {
    $q = "UPDATE Users SET email = '$email', name = '$name', phone = $phone WHERE consumer_id = $con_id";
    if ($GLOBALS['conn']->query($q) === TRUE) {
      return TRUE;
    } 
    return FALSE;
 }

  function updateMeterData($id, $consumer_id, $conn_status, $conn_type, $conn_date, $region, $address, $phase) {
    $q = "UPDATE Meterdata SET consumer_id = $consumer_id, conn_status = '$conn_status', conn_type = '$conn_type', conn_date = '$conn_date', region = '$region', address = '$address', phase_id = '$phase' WHERE meter_num = $id";
    if ($GLOBALS['conn']->query($q) === TRUE) {
      return TRUE;
    }
    return FALSE;
  }

  function updateMeterStatus($id, $status) {
    if($status == "Active") {
      $q = "UPDATE Meterdata SET conn_status = 'Inactive' WHERE meter_num = '$id'";
    } else {
      $q = "UPDATE Meterdata SET conn_status = 'Active' WHERE meter_num = '$id'";
    }
    if ($GLOBALS['conn']->query($q) === TRUE) {
      return TRUE;
    }
    return FALSE;
  }

  function updateBillData() {
    $id = $_GET["meter_num"];
    $con_name = $_GET["consumer_name"];
    $con_id = $_GET["consumer_id"];

    //GET BILL DETAILS
    $bill = $_GET["bill_num"];
    $date = $_POST["bill_date"];
    $due = date('Y-m-d', strtotime($date. ' + 20 days'));
    $current_read = $_POST["current_read"];
    $amount = $_POST["charges"];
    $status = $_POST["Status"];

    $q = "UPDATE Bills SET bill_date = '$date', due_date = '$due', current_reading = '$current_read', charges = $amount, stage = '$status' WHERE bill_no = $bill";
    if ($GLOBALS['conn']->query($q) === TRUE) {
      $_SESSION["toast"] = 1;
      $_SESSION["toastMessage"] = "Bill Updated Successfully"; 
    } else {
      $_SESSION["toast"] = 0;
      $_SESSION["toastMessage"] = "Failed to Update Bill";
    }    
    echo "<script>window.location.href='../../UI/admin/consumerdetails.php?meter_num=$id&consumer_name=$con_name&consumer_id=$con_id&bill=block';</script>";
  }

  function updateComplaint() {
    $status = $_POST["Status"];
    $id = $_GET["complaint_id"];
    $bill = $_GET["bill_num"];
    $query_status = 0;
    
    $q = "UPDATE complaints SET status = '$status' WHERE complaint_id = '$id'";
    if ($GLOBALS['conn']->query($q) === TRUE) {
      $query_status = 1;
    }

    //reset bill status to paid or unpaid depending on txn_id
    $qc = "SELECT txn_id FROM bills where bill_no = $bill";
    $res = $GLOBALS['conn']->query($qc);
    $r = $res->fetch_assoc();
    
    if($status == "Resolved") {
      if($r["txn_id"] == NULL) {
        $q = "UPDATE bills SET stage = 'Unpaid' WHERE bill_no = '$bill'";
      } else {
        $q = "UPDATE bills SET stage = 'Paid' WHERE bill_no = '$bill'";
      }
    } else {
      $q = "UPDATE bills SET stage = 'Pending' WHERE bill_no = '$bill'";
    }

    if ($GLOBALS['conn']->query($q) === TRUE) {
      $query_status = 2;
    } else {
      $query_status = -1;
    }    

    if($query_status != 2) {
      $_SESSION["toast"] = 0;
      if($query_status == 0) {
        $_SESSION["toastMessage"] = "Failed to Execute Query";
      } elseif($query_status == -1) {
        $_SESSION["toastMessage"] = "Complaint Updated Successfully<BR>Failed to Update Bill"; 
      } else {
        $_SESSION["toastMessage"] = "Failed to Update Complaint<BR>Bill Updated Successfully"; 
      }
    } else {
      $_SESSION["toast"] = 1;
      $_SESSION["toastMessage"] = "Complaint Updated Successfully<BR>Bill Updated Successfully"; 
    }

    if($query_status == 0) {

    } elseif($query_status == 1) {

    } elseif($query_status == 2) {

    } elseif($query_status == -1) {

    } else {

    }
    echo "<script>window.location.href='../../UI/admin/complaints.php';</script>";
  }

?>