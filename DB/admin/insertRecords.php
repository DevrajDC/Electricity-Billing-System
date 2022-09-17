<?php
if(session_status() === PHP_SESSION_NONE) {
  session_start();
}
define("METERNUMBER", 0);
define("CURRENT_READ", 1);
define("PREV_READ", 2);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "EBS";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
  echo "Connection Established";
}

function calculateCharges($meter_num, $units) {
  $conn_type = "";
  $phase_id = "";
  $fix_charge = 0;
  $unit_charges = 0;

  $quer = "SELECT conn_type, phase_id FROM meterdata WHERE meter_num = $meter_num";
  $result = $GLOBALS['conn']->query($quer);
  $row = $result->fetch_assoc();
  echo "<BR>conn_type: " . $row["conn_type"] . "<BR>phase_id: " . $row["phase_id"] . "<BR>";
  $conn_type = $row['conn_type'];
  $phase_id = $row['phase_id'];
  
  //calculate phase charges
  $quer = "SELECT phase_charges FROM phase WHERE phase_id = '$phase_id'";
  $result = $GLOBALS['conn']->query($quer);
  $row = $result->fetch_assoc();
  echo "<BR>Phase Charges: " . $row["phase_charges"] . "<br>";
  $fix_charge = $row['phase_charges'];

  //calculate unitwise charges
  $fixed_vars = array("HT-AG", "HT-AGP", "HT-C", "HT-D", "HT-F", "LT-AGA", "LT-AGP", "LT-P");
  
  if(in_array($conn_type, $fixed_vars)) {
    echo "<BR>Fixed Variable Charges: ";
    $quer = "SELECT charges FROM tariff WHERE slab_id = '$conn_type'";
    $result = $GLOBALS['conn']->query($quer);
    $row = $result->fetch_assoc();
    echo "<BR>units: ". $units. "<BR>Cost: " . $units * $row['charges']. "<BR>";
    $unit_charges = $units * $row['charges'];
    return ($fix_charge + $unit_charges);
  } else {
    $ind_arr = array('A', 'B', 'C', 'D', 'E');
    if($conn_type == "LT-D-A") {
      $iter = 0;
      while($units != 0) {
        $conn_type = substr($conn_type,0,5) . $ind_arr[$iter];
        $quer = "SELECT charges FROM tariff WHERE slab_id = '$conn_type'";
        $result = $GLOBALS['conn']->query($quer);
        $row = $result->fetch_assoc();
        if($iter == 4 || $units < 100) {
          $unit_charges += ($units * $row['charges']);                
          $units -= $units;
        } else {
          $unit_charges += (100 * $row['charges']);
          $units -= 100;
        }
        if($iter <4) {
          $iter++;
        }
      }
      echo "<BR>Fixed Charge: " . $fix_charge . "<BR>Var Charge: " . $unit_charges . "<BR>Total Charges: " . ($fix_charge + $unit_charges);
      return $fix_charge + $unit_charges;
    } elseif($conn_type == "LT-C-A") {
      $iter = 0;
      while($units != 0) {
        $conn_type = substr($conn_type,0,5) . $ind_arr[$iter];
        $quer = "SELECT charges FROM tariff WHERE slab_id = '$conn_type'";
        $result = $GLOBALS['conn']->query($quer);
        $row = $result->fetch_assoc();
        if($iter == 3 || $units < 100) {
          $unit_charges += ($units * $row['charges']);                
          $units -= $units;
        } elseif($units > 100 && $iter == 2) {
          $unit_charges += (200 * $row['charges']);
          $units -= 200;
        } else {
          $unit_charges += (100 * $row['charges']);
          $units -= 100;
        }
        if($iter < 3) {
          $iter++;
        }
      }
      echo "<BR>Fixed Charge: " . $fix_charge . "<BR>Var Charge: " . $unit_charges . "<BR>Total Charges: " . ($fix_charge + $unit_charges);
      return $fix_charge + $unit_charges;
    } elseif($conn_type == "LT-I-A") {
      if($units > 500) {
        $quer = "SELECT charges FROM tariff WHERE slab_id = '$conn_type'";
        $result = $GLOBALS['conn']->query($quer);
        $row = $result->fetch_assoc();  
        $unit_charges += (500 * $row['charges']);                
        $conn_type = substr($conn_type,0,5) . "B";
        $quer = "SELECT charges FROM tariff WHERE slab_id = '$conn_type'";
        $result = $GLOBALS['conn']->query($quer);
        $row = $result->fetch_assoc();  
        $unit_charges += (($units-500) * $row['charges']);                
      } else {
        $quer = "SELECT charges FROM tariff WHERE slab_id = '$conn_type'";
        $result = $GLOBALS['conn']->query($quer);
        $row = $result->fetch_assoc();  
        $unit_charges += ($units * $row['charges']);                
      }  
      echo "<BR>Fixed Charge: " . $fix_charge . "<BR>Var Charge: " . $unit_charges . "<BR>Total Charges: " . ($fix_charge + $unit_charges);
      return $fix_charge + $unit_charges;
    } elseif($conn_type == "HT-I-A") {
      $quer = "SELECT charges FROM tariff WHERE slab_id = '$conn_type'";
      $result = $GLOBALS['conn']->query($quer);
      $row = $result->fetch_assoc();  
      $unit_charges += ($units * $row['charges']);                
      return $fix_charge + $unit_charges;
    }
  }
}


//Start
if(isset($_FILES['flat_file'])) {

  // echo "<BR>File submitted successfully<BR>";
  $iquery = "SELECT bill_no FROM bills ORDER BY bill_no DESC LIMIT 1";
  $result = $conn->query($iquery);
  $bill_ind = 0;

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<BR><BR>last Bill: " . $row["bill_no"]."<br>";
      $bill_ind = $row["bill_no"] + 1;
    }
  } else {
    echo "0 results";
  }

  if($_FILES['flat_file']['error'] === UPLOAD_ERR_OK) {
    $fileName = $_FILES['flat_file']['name'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    echo "<BR>extension: ".$fileExtension."<BR>";

    // check if file has one of the following extensions
    $allowedfileExtensions = array('xls', 'csv');

    if (in_array($fileExtension, $allowedfileExtensions)) {
      $fileTmpPath = $_FILES['flat_file']['tmp_name'];
      $row = 1;
      if (($handle = fopen($fileTmpPath, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
          $row++;
          $meter_num = $data[METERNUMBER];
          // echo "<BR><BR>Meter: " . $meter_num . "<BR>";
          $consumer_id = 0;
          $prev_dues = 0;
          $sql = "SELECT consumer_id, charges, stage FROM bills WHERE meter_num = $meter_num LIMIT 1";
          $result = $conn->query($sql);
  
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              // echo "<BR>consumer_id: " . $row["consumer_id"]. " - Charges: " . $row["charges"]. " - Stage: " . $row["stage"]. "<br>";
              $consumer_id = $row['consumer_id'];
              $prev_dues =  $row['stage'] == "Unpaid" ? $row['charges'] : 0;
            }
          } else {
            echo "<BR><BR>0 results<BR><BR>";
          }
  
          $current_reading = $data[CURRENT_READ];
          $prev_reading = $data[PREV_READ];
          $charges = calculateCharges($meter_num, $current_reading - $prev_reading) + $prev_dues;
          $bill_date = date("Y-m-d");
          $due_date = Date('Y-m-d', strtotime('+20 days'));
  
          echo "<BR><BR>bill_ind: " . $bill_ind;
          echo "<BR>meter_num: " . $meter_num;
          echo "<BR>consumer_id: " . $consumer_id;
          echo "<BR>billDate: " . $bill_date;
          echo "<BR>dueDate: " . $due_date;
          echo "<BR>current: " . $current_reading;
          echo "<BR>prev: " . $prev_reading;
          echo "<BR>prev_dues: " . $prev_dues;
          echo "<BR>charges: " . $charges . "<BR>";
          
          $q = "INSERT INTO Bills VALUES ($bill_ind, $meter_num, $consumer_id, '$bill_date', '$due_date', $current_reading, $prev_reading, $prev_dues, $charges, 'Unpaid', NULL);";
          if ($conn->query($q) === TRUE) {
            echo "Records inserted successfully";
          } else {
            echo "Error inserting records: " . $conn->error;
          }
          $bill_ind++;
  
        }
        fclose($handle);
      }
      $_SESSION["toast"] = 1;
      $_SESSION["toastMessage"] = "Records Inserted Successfully";
    } else {
      $_SESSION["toast"] = 0;
      $_SESSION["toastMessage"] = "Upload failed. Allowed file types: " . implode(',', $allowedfileExtensions);
    }
  } else {
    $_SESSION["toast"] = 0;
    $_SESSION["toastMessage"] = "File Error";
  }
} else {
  $_SESSION["toast"] = 0;
  $_SESSION["toastMessage"] = "File Not Sent to Server";
}

if($_SESSION["toast"] == 1) {
  header("Location: ../../UI/admin/index.php");
} else {
  header("Location: ../../UI/admin/uploadFile.php");
}
die();
?>
