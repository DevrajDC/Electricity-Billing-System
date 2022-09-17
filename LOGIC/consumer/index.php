<?php
  session_start();  
  $consumer = "";
  include("../../DB/consumer/UI.php");
  
  if (isset($_COOKIE["consumer"])) {
    $_SESSION["consumer"] = $_COOKIE["consumer"];
    $consumer = $_SESSION["consumer"];
  } elseif (isset($_SESSION["consumer"])) {
    $consumer = $_SESSION["consumer"];
    unset($_SESSION["meter_num"]);
  } else {
    header('Location: ../login.php');
    die();
  }

  if(isset($_GET["action"])) {
    $_GET["action"]();
  }

  function displayConnections() {
    $result = displayActiveConn($GLOBALS["consumer"]);
    if (mysqli_num_rows($result) == 0) {
      echo "<!-- Empty State Starts -->
            <div class='flex justify-center border-solid border-b border-gray-200 pb-4'>
              <img width='300px' src='../../UI/library/assets/no content backup.png' alt='No Active Connections'>
            </div>
            <!-- Empty State End -->";
    } else {
      while ($row = $result->fetch_assoc()) {
        echo "<!-- Meter Card Starts -->
              <div class='flex justify-between border-solid border-b border-gray-200 pb-4 gap-40'>
                <div class='flex flex-col space-y-4'>
                  <div><h1 class='text-lg font-bold'>Connection ID: ".$row["meter_num"]."</h1></div>
                  <div class='whitespace-normal'>".$row["address"]."</div>
                  <div class='flex space-x-4'>
                    <div class='space-y-1 flex items-center'>
                      <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='mr-2 flex-shrink-0 h-5 w-5 group-hover:text-indigo-500'>
                        <path stroke-linecap='round' stroke-linejoin='round' d='M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z' />
                        <path stroke-linecap='round' stroke-linejoin='round' d='M6 6h.008v.008H6V6z' />
                      </svg>
                      <span class='flex-1'>".$row["conn_type"]."</span>
                    </div>
                    <div class='space-y-1 flex items-center'>
                      <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='mr-2 flex-shrink-0 h-5 w-5 group-hover:text-indigo-500'>
                        <path stroke-linecap='round' stroke-linejoin='round' d='M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z' />
                      </svg>
                      <span class='flex-1'>".$row["phase_id"]."</span>
                    </div>
                    <div class='space-y-1 flex items-center'>
                      <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='mr-2 flex-shrink-0 h-5 w-5 group-hover:text-indigo-500'>
                          <path stroke-linecap='round' stroke-linejoin='round' d='M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z' />
                      </svg>
                      <span class='flex-1'>".$row["conn_status"]."</span>
                    </div>
                  </div>
                </div>
                <a href='bills.php?meter_num=".$row["meter_num"]."'>
                  <button type='button' class='inline-flex items-center px-2.5 py-1.5 border border-transparent text-sm font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'>
                    Proceed
                  </button>
                </a>
              </div>
              <!-- Meter Card End -->";
      }
    }
  }

  function getConnType() {
    $result = getTableData("Tariff", "slab_id");
    while ($row = $result->fetch_assoc()) {
      echo "<option value='".$row["slab_id"]."'>".$row["slab_id"]."</option>";
    }
  }

  function getPhase() {
    $result = getTableData("Phase", "phase_id");
    while ($row = $result->fetch_assoc()) {
      echo "<option value='".$row["phase_id"]."'>".$row["phase_id"]."</option>";
    }
  }

  function requestMeter() {
    $consumer_id = $_POST["consumer-id"];
    $address = $_POST["meter-address"];
    $region = $_POST["region"];
    $conn_type = $_POST["conn_type"];
    $phase = $_POST["phase"];

    $request= createMeterRequest($consumer_id, $address, $region, $conn_type, $phase);
    if ($request) {
      $_SESSION["toast"] = 1;
      $_SESSION["toastMessage"] = "Meter Requested Successfully"; 
    } else {
      $_SESSION["toast"] = 0;
      $_SESSION["toastMessage"] = "Error Submitting Request";
    }
    echo "<script>window.location.href='../../UI/consumer/index.php';</script>";
  }

?>
