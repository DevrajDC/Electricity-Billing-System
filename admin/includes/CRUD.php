<?php
  include("dbConnection.php");

  //Call function based on action set in url
  $_GET["action"]();

  function getDist() {
    if(isset($_POST['region'])) {
      $region = $_POST['region'];
      echo "<script>console.log('$region');</script>";
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "EBS";
      
      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);    
      $qc = "SELECT name, distributor_id FROM distributor where region = '$region'";
      $res = $conn->query($qc);
      while($r = $res->fetch_assoc()) {   
        echo "<option value='".$r["distributor_id"]."'>".$r['name']."</option>";
      }
    }
  }

  function updateComplaint() {
    $status = $_POST["Status"];
    $id = $_GET["complaint_id"];
    $bill = $_GET["bill_num"];
    
    $q = "UPDATE complaints SET status = '$status' WHERE complaint_id = '$id'";
    if ($GLOBALS['conn']->query($q) === TRUE) {
        echo "<script>
        alert('Complaint Status Updated Successfully');
        </script>";    
    } else {
        echo "<script>
        alert('Error Updating Records');
        </script>";
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
        echo "<script>
        alert('Bill Updated Successfully');
        </script>";    
    } else {
        echo "<script>
        alert('Error Updating Bill');
        </script>";
    }

    echo "<script>window.location.href='../complaints.php';</script>";
  }

  function editDistributor() {
    //User details
    echo "<BR>distributor_id: " .$_POST["distributor-id"];
    echo "<BR>provider_id: " .$_POST["provider-id"];
    echo "<BR>Name: " .$_POST["name"];
    echo "<BR>Region: " .$_POST["region"];
    
    $id = $_POST["distributor-id"];
    $p_id = $_POST["provider-id"];
    $name = $_POST["name"];
    $region = $_POST["region"];

    $q = "UPDATE distributor SET provider_id = '$p_id', name = '$name', region = '$region' WHERE distributor_id = '$id'";
    if ($GLOBALS['conn']->query($q) === TRUE) {
      echo "<script>
      alert('Distributor Updated Successfully');
      </script>";    
    } else {
      echo "<script>
      alert('Error Updating Records');
      </script>";
    }
    echo "<script>window.location.href='../distributors.php';</script>";
  }

  function editProvider() {
    //User details
    echo "<BR>provider_id: " .$_POST["provider-id"];
    echo "<BR>Name: " .$_POST["provider-name"];
    echo "<BR>Provisions: " .$_POST["provisions"];
    
    $p_id = $_POST["provider-id"];
    $name = $_POST["provider-name"];
    $provisions = $_POST["provisions"];

    $q = "UPDATE provider SET name = '$name', num_provisions = '$provisions' WHERE provider_id = '$p_id'";
    if ($GLOBALS['conn']->query($q) === TRUE) {
      echo "<script>
      alert('Provider Updated Successfully');
      </script>";    
    } else {
      echo "<script>
      alert('Error Updating Records');
      </script>";
    }
    echo "<script>window.location.href='../providers.php';</script>";
  }

  function toggleProvider() {
    //User details
    $id = $_POST["provider-disable-id"];
    $status = $_POST["provider-status"];
    echo "<BR>provider_id: ".$id;
    echo "<BR>Status: ".$status;

    if($status == "Active") {
      $status = "Inactive";
    } else {
      $status = "Active";
    }

    $q = "UPDATE provider SET status = '$status' WHERE provider_id = $id";
    if ($GLOBALS['conn']->query($q) === TRUE) {
        echo "<script>
        alert('Provider Updated Successfully');
        </script>";    
      } else {
          echo "<script>
          alert('Error Updating Provider');
          </script>";
      }
    echo "<script>window.location.href='../providers.php';</script>";
  }

  function toggleDistributor() {
    //User details
    $id = $_POST["distributor-delete-id"];
    $status = $_POST["distributor-status"];
    echo "<BR>distributor_id: ".$id;
    echo "<BR>Status: ".$status;

    if($status == "Active") {
      $status = "Inactive";
    } else {
      $status = "Active";
    }
    echo "<BR>Status: ".$status;
    $q = "UPDATE distributor SET status = '$status' WHERE distributor_id = $id";
    if ($GLOBALS['conn']->query($q) === TRUE) {
        echo "<script>
        alert('Distributor Updated Successfully');
        </script>";    
      } else {
          echo "<script>
          alert('Error Updating Distributor');
          </script>";
      }
    echo "<script>window.location.href='../distributors.php';</script>";
  }

  function approveUser() {
    $id = $_POST["consumer_id"];
    $meter_no = $_POST["meter-no"];
    $conn_status = $_POST["conn_status"]; 
    $conn_type = $_POST["consumer_conn_type"];
    $conn_date = $_POST["conn_date"];
    $region = $_POST["consumer_region"];
    $address = $_POST["consumer_address"];
    $phase_id = $_POST["consumer_phase_id"];
    $distributor = $_POST["distributor"];

    //insert Meter details
    $q = "INSERT INTO Meterdata VALUES ($meter_no, $id, '$conn_status', '$conn_type', '$conn_date', '$region', '$address', '$phase_id', $distributor)";
    if ($GLOBALS['conn']->query($q) === TRUE) {
        echo "<script>
        alert('Meter Added Successfully');
        </script>";    
    } else {
        echo "<script>
        alert('Error Adding Meter');
        </script>";
    }

    //delete user request
    $q = "DELETE FROM consumerrequest WHERE id = '$id'";
    if ($GLOBALS['conn']->query($q) === TRUE) {
        echo "<script>
        alert('User Requests Updated');
        </script>";    
    } else {
        echo "<script>
        alert('Error Updating User Requests');
        </script>";
    }
    echo "<script>window.location.href='../index.php';</script>";
  }

  function deleteUserReq() {
    //User details
    echo "<BR>Req_id: " .$_POST["userreq-delete-id"];
    $id = $_POST["userreq-delete-id"];

    $q = "DELETE FROM consumerrequest WHERE id = '$id'";
    if ($GLOBALS['conn']->query($q) === TRUE) {
        echo "<script>
        alert('Request Deleted Successfully');
        </script>";    
      } else {
          echo "<script>
          alert('Error Deleting Request');
          </script>";
      }
    echo "<script>window.location.href='../index.php';</script>";
  }

  function toggleMeter() {
    //Meter details
    echo "<BR>Meter Id: " .$_POST["meter-num"];
    echo "<BR>Meter Status: " .$_POST["conn-status"];
    $id = $_POST["meter-num"];
    $con_name = $_POST["consumer-name"];
    $con_id = $_POST["consumer-id"];
    $status = $_POST["conn-status"];

    echo "<script>
    alert($status);
    </script>";    

    if($status == "Active") {
      $q = "UPDATE Meterdata SET conn_status = 'Inactive' WHERE meter_num = '$id'";
    } else {
      $q = "UPDATE Meterdata SET conn_status = 'Active' WHERE meter_num = '$id'";
    }
    if ($GLOBALS['conn']->query($q) === TRUE) {
        echo "<script>
        alert('Meter Updated Successfully');
        </script>";    
      } else {
          echo "<script>
          alert('Error Updating Meter');
          </script>";
      }
    echo "<script>window.location.href='../consumerdetails.php?meter_num=$id&consumer_name=$con_name&consumer_id=$con_id&bill=none';</script>";
  }

  function updateBill() {
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
    echo $q;
    if ($GLOBALS['conn']->query($q) === TRUE) {
      echo "<script>
      alert('Bill Updated Successfully');
      </script>";    
    } else {
        echo "<script>
        alert('Error Updating Bill');
        </script>";
    }
    echo "<script>window.location.href='../consumerdetails.php?meter_num=$id&consumer_name=$con_name&consumer_id=$con_id&bill=none';</script>";
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

    $q = "UPDATE Meterdata SET consumer_id = $consumer_id, conn_status = '$conn_status', conn_type = '$conn_type', conn_date = '$conn_date', region = '$region', address = '$address', phase_id = '$phase' WHERE meter_num = $id";
    echo $q;
    if ($GLOBALS['conn']->query($q) === TRUE) {
      echo "<script>
      alert('Meter Updated Successfully');
      </script>";    
    } else {
        echo "<script>
        alert('Error Updating Meter');
        </script>";
    }
    echo "<script>window.location.href='../consumerdetails.php?meter_num=$id&consumer_name=$con_name&consumer_id=$con_id&bill=none';</script>";
  }

  function updateUser() {
    $id = $_GET["meter_num"];
    $con_name = $_GET["consumer_name"];
    $con_id = $_GET["consumer_id"];

    //get meter details
    $name = $_POST["consumer-name"];
    $phone = $_POST["consumer-phone"];
    $email = $_POST["consumer-email"];
    echo"<br>name: ".$name;
    echo"<br>phone: ".$phone;
    echo"<br>email: ".$email;
    echo"<br>con-id: ".$con_id;

    $q = "UPDATE Users SET email = '$email', name = '$name', phone = $phone WHERE consumer_id = $con_id";
    echo $q;
    if ($GLOBALS['conn']->query($q) === TRUE) {
      echo "<script>
      alert('User Updated Successfully');
      </script>";    
    } else {
        echo "<script>
        alert('Error Updating User');
        </script>";
    }
    echo "<script>window.location.href='../consumerdetails.php?meter_num=$id&consumer_name=$con_name&consumer_id=$con_id&bill=none';</script>";
  }

?>