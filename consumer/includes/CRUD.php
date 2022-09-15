<?php
  include("dbConnection.php");

  //Call function based on action set in url
  $_GET["action"]();

  function requestMeter() {
    $consumer = $_POST["consumer-id"];
    $address = $_POST["meter-address"];
    $region = $_POST["region"];
    $conn_type = $_POST["conn_type"];
    $phase = $_POST["phase"];

    $query = "SELECT name, email, phone, pwd FROM Users Where consumer_id = $consumer";
    $result = $GLOBALS['conn']->query($query);
    $re = $result->fetch_assoc();
    
    $name = $re["name"];
    $email = $re["email"];    
    $phone = $re["phone"];
    $pwd = $re["pwd"]; 

    $q = "INSERT INTO consumerrequest VALUES ($consumer, '$name', '$email', '$address', $phone, '$pwd', '$region', '$conn_type', '$phase')";
    if ($GLOBALS['conn']->query($q) === TRUE) {
      echo "<script>
      alert('Meter Requested Successfully');
      </script>";    
    } else {
      echo "<script>
      alert('Error Requesting Meter');
      </script>";
    }
    echo "<script>window.location.href='../index.php';</script>";
  }

  function registerComplaint() {
    $bill_num = $_POST["bill_num"];
    $summary = $_POST["summary"];
    $meter_num = $_POST["meter_num"];
    
    $query = "SELECT complaint_id FROM complaints ORDER BY complaint_id DESC LIMIT 1";
    $result = $GLOBALS['conn']->query($query);
    $re = $result->fetch_assoc();
    $complaint_id = ($re["complaint_id"]+1);

    $q = "INSERT INTO complaints VALUES ($complaint_id, '$bill_num', 'Pending', '$summary')";
    if ($GLOBALS['conn']->query($q) === TRUE) {
      echo "<script>
      alert('Complaint Registered Successfully');
      </script>";    
    } else {
      echo "<script>
      alert('Error Registering Complaint');
      </script>";
    }
    $q = "UPDATE bills SET stage = 'Pending' WHERE bill_no = $bill_num";
    if ($GLOBALS['conn']->query($q) === TRUE) {
      echo "<script>
      alert('Bill Updated Successfully');
      </script>";    
    } else {
      echo "<script>
      alert('Error Updating Bill');
      </script>";
    }
    echo "<script>window.location.href='../bills.php?meter_num$meter_num';</script>";

  }

  function updateUser() {
    $con_id = $_GET["consumer_id"];

    //get user details
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
    echo "<script>window.location.href='../profile.php';</script>";
  }

?>


<div id="profile1" class="w-fit rounded-md bg-green-50 p-4 z-100 relative mx-auto bottom-4 ">
    <div class="flex">
      <div class="flex-shrink-0">
        <!-- Heroicon name: solid/check-circle -->
        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
        </svg>
      </div>
      <div class="ml-3">
        <p class="text-sm font-medium text-green-800">Successfully updated</p>
      </div>
      <div class="ml-auto pl-3">
        <div class="-mx-1.5 -my-1.5">
          <button type="button" class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600">
            <span class="sr-only">Dismiss</span>
            <!-- Heroicon name: solid/x -->
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- toast end -->