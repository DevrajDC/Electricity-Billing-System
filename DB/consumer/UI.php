<?php
  include("../../DB/dbConnection.php");

  function displayActiveConn($consumer) {
    $quer = "SELECT * FROM Meterdata WHERE consumer_id = $consumer";
    $result = $GLOBALS['conn']->query($quer);
    return $result;
  }

  function getBills($meter) {
    $quer = "SELECT * FROM Bills WHERE meter_num = $meter ORDER BY bill_no DESC";
    $result = $GLOBALS['conn']->query($quer);
    return $result;
  }

  function getComplaintStatus($bill_no) {
    $qc = "SELECT COUNT(complaint_id) FROM complaints WHERE bill_no = $bill_no AND status = 'Pending'";
    $res = $GLOBALS['conn']->query($qc);
    return $res->fetch_assoc();
  }

  function getTableData($table, $Pkey) {
    $quer = "SELECT ".$Pkey." FROM ".$table;
    $result = $GLOBALS['conn']->query($quer);
    return $result;
  }

  function getComplaintData($meter) {
    $quer = "select * from complaints where bill_no in (select bill_no from bills where meter_num = $meter)";
    $result = $GLOBALS['conn']->query($quer);
    return $result;
  }

  function getUserDetails ($con_id) {
    $quer = "SELECT email, name, phone FROM Users WHERE consumer_id = $con_id";
    $result = $GLOBALS['conn']->query($quer);
    return $result->fetch_assoc();
  }

  function getUserAttr($con_id, $meter) {
    $result = [];
    $q = "SELECT address FROM meterdata WHERE meter_num = $meter";
    $res1 = $GLOBALS['conn']->query($q);
    $r1 = $res1->fetch_assoc();
    $result['address'] = $r1["address"];
    $q = "SELECT COUNT(meter_num) FROM meterdata WHERE consumer_id = $con_id";
    $res2 = $GLOBALS['conn']->query($q);
    $r2 = $res2->fetch_assoc();
    $result['num_conn'] = $r2["COUNT(meter_num)"];
    return $result;
  }

  function createMeterRequest($consumer_id, $address, $region, $conn_type, $phase) {
    $query = "INSERT INTO consumerrequest VALUES ($consumer_id, '$address', '$region', '$conn_type', '$phase')";
    if($GLOBALS['conn']->query($query) === TRUE) {
      return TRUE;
    }
    return FALSE;
  }

  function updateUserDetails($con_id, $email, $phone) {
    $q = "UPDATE Users SET email = '$email', phone = $phone WHERE consumer_id = $con_id";
    echo $q;
    if ($GLOBALS['conn']->query($q) === TRUE) {
      return TRUE;
    }
    return FALSE;
  }

  function insertComplaintDB($bill_num, $summary) {
    //get latest complaint id
    $query = "SELECT complaint_id FROM complaints ORDER BY complaint_id DESC LIMIT 1";
    $result = $GLOBALS['conn']->query($query);
    $re = $result->fetch_assoc();
    $complaint_id = ($re["complaint_id"] + 1);

    //add new complaint
    $q = "INSERT INTO complaints VALUES ($complaint_id, '$bill_num', 'Pending', '$summary')";
    $status = 0;
    if ($GLOBALS['conn']->query($q) === TRUE) {
      $status = 1;
    }

    $q = "UPDATE bills SET stage = 'Pending' WHERE bill_no = $bill_num";
    if ($GLOBALS['conn']->query($q) === TRUE) {
      $status = 2;
    } else {
      $status = -1;
    }
    return $status;
  }

  function updateBillPayment($data) {
    $billNum = $data["billNum"];
    $txn = $data["payment_id"];
    
    $q = "UPDATE bills SET stage='Paid', txn_id='$txn' WHERE bill_no = $billNum";
    if ($GLOBALS['conn']->query($q) === TRUE) {
      return TRUE;
    }
    return FALSE;
  }

?>
