<?php
include("../../DB/consumer/UI.php");

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
if (isset($_GET["action"])) {
  $_GET["action"]();
}
if (isset($_SESSION["meter_num"])) {
  $meter = $_SESSION["meter_num"];
} else {
  $_SESSION["meter_num"] = $_GET["meter_num"];
  $meter = $_SESSION["meter_num"];
}
$con = $_SESSION["consumer"];

function displayBills()
{
  $result = getBills($GLOBALS["meter"]);
  while ($row = $result->fetch_assoc()) {
    $bill_no = $row["bill_no"];
    echo "<tr>
        <td class='px-6 py-4 whitespace-nowrap'>
            <div class='text-sm font-medium text-gray-900'>
                " . $row['bill_no'] . "
           </div>
        </td>
        <td class='px-6 py-4 whitespace-nowrap'>
            <div class='text-sm text-gray-900'>
            ₹ " . $row["charges"] . "
            </div>
        </td>
        <td class='px-6 py-4 whitespace-nowrap'>
            <span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full ";
    if ($row['stage'] == "Paid") echo "bg-green-100";
    else if ($row['stage'] == "Unpaid") echo "bg-red-100";
    else echo "bg-indigo-100";
    echo "'>" . $row["stage"] . "</span>
        </td>
        <td class='px-6 py-4 whitespace-nowrap'>
            <div class='text-sm text-gray-900'>" . $row["bill_date"] . "</div>
        </td>
        <td class='px-6 py-4 whitespace-nowrap'>
            <div class='text-sm text-red-600'>" . $row["due_date"] . "</div>
        </td>
        <td class='px-6 py-4 whitespace-nowrap text-right'>";
    if ($row['stage'] == 'Paid' || $row['stage'] == "Pending") {
      echo "<button type='button' onclick='toggleModal(\"add-meter-modal\")' class='no-underline inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-gray-400 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 cursor-not-allowed mr-2' disabled>
                    <svg xmlns=http://www.w3.org/2000/svg viewBox='0 0 24 24' fill='currentColor' class='w-5 h-5 mr-2'>
                        <path fill-rule='evenodd' d='M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM9 7.5A.75.75 0 009 9h1.5c.98 0 1.813.626 2.122 1.5H9A.75.75 0 009 12h3.622a2.251 2.251 0 01-2.122 1.5H9a.75.75 0 00-.53 1.28l3 3a.75.75 0 101.06-1.06L10.8 14.988A3.752 3.752 0 0014.175 12H15a.75.75 0 000-1.5h-.825A3.733 3.733 0 0013.5 9H15a.75.75 0 000-1.5H9z' clip-rule='evenodd' />
                    </svg>
                    PayBill
          </button>";
    } else {
      echo "<form class='inline-flex'>
      <a href='javascript:void(0)' class='pay_now no-underline inline-flex items-center ml-3 px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-blue-600 hover:bg-blue-700 hover:no-underline focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 mr-2' data-amount='$row[charges]'> <svg xmlns=http://www.w3.org/2000/svg viewBox='0 0 24 24' fill='currentColor' class='w-5 h-5 mr-2'>
              <path fill-rule='evenodd' d='M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM9 7.5A.75.75 0 009 9h1.5c.98 0 1.813.626 2.122 1.5H9A.75.75 0 009 12h3.622a2.251 2.251 0 01-2.122 1.5H9a.75.75 0 00-.53 1.28l3 3a.75.75 0 101.06-1.06L10.8 14.988A3.752 3.752 0 0014.175 12H15a.75.75 0 000-1.5h-.825A3.733 3.733 0 0013.5 9H15a.75.75 0 000-1.5H9z' clip-rule='evenodd' />
          </svg>
          PayBill
      </a>
  </form>";
    }
    $r = getComplaintStatus($bill_no);
    if ($r["COUNT(complaint_id)"]) {
      echo "<button type='button' onclick='toggleModal(\"complaint-model\")' class='no-underline inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-gray-400 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 cursor-not-allowed' disabled>
                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='w-5 h-5 mr-2'>
                        <path fill-rule='evenodd' d='M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z' clip-rule='evenodd' />
                    </svg> Raise Complaint
                </button>";
    } else {
      echo "<button type='button' onclick='complaintForm(\"" . $row['bill_no'] . "\", \"" . $GLOBALS["meter"] . "\"); toggleModal(\"complaint-modal\"); populate' class='no-underline inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500'>
                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='w-5 h-5 mr-2'>
                        <path fill-rule='evenodd' d='M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z' clip-rule='evenodd' />
                    </svg>
                    Raise Complaint
                </button>";
    }
    echo "</td>
      </tr>";
  }
}

function registerComplaint()
{
  $bill_num = $_POST["bill_num"];
  $summary = $_POST["summary"];
  $meter_num = $_POST["meter_num"];

  $result = insertComplaintDB($bill_num, $summary);

  if ($result == 2) {
    $_SESSION["toast"] = 1;
    $_SESSION["toastMessage"] = "Complaint Registered Successfully<BR>Bill Updated Successfully";
  } else {
    $_SESSION["toast"] = 0;
    if ($result == 0) {
      $_SESSION["toastMessage"] = "Error Registering Complaint";
    } elseif ($result == 1) {
      $_SESSION["toastMessage"] = "Complaint Registered Successfully<BR>Error Updating Bill";
    } else {
      $_SESSION["toastMessage"] = "Error Registering Complaint<BR>Bill Updated Successfully";
    }
  }
  echo "<script>window.location.href='../../UI/consumer/bills.php?meter_num$meter_num';</script>";
}

function displayComplaints($meter)
{
  $result = getComplaintData($meter);
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td class='px-6 py-4 whitespace-nowrap'>
          <div class='text-sm font-medium text-gray-900'>
            " . $row["complaint_id"] . "
          </div>
        </td>
        <td class='px-6 py-4 whitespace-nowrap'>
          <div class='text-sm font-medium text-gray-900'>
            " . $row["bill_no"] . "
          </div>
        </td>
        <td class='px-6 py-4 whitespace-nowrap'>
          <span class='px-2 inline-flex text-xs leading-5 font-semibold rounded-full ";
    if ($row["status"] == "Resolved") {
      echo "bg-green-100 text-green-800";
    } else {
      echo "bg-indigo-100 text-indigo-800";
    }
    echo "'>" . $row["status"] . " 
          </span>
        </td>
        <td class='px-6 py-4 whitespace-wrap text-sm text-gray-500'>" . $row["summary"] . "</td>
      </tr>";
  }
}

function updateUser()
{
  $con_id = $_GET["consumer_id"];

  //get user details
  $phone = $_POST["consumer-phone"];
  $email = $_POST["consumer-email"];
  echo "<br>phone: " . $phone;
  echo "<br>email: " . $email;
  echo "<br>con-id: " . $con_id;

  $result = updateUserDetails($con_id, $email, $phone);
  if ($result) {
    $_SESSION["toast"] = 1;
    $_SESSION["toastMessage"] = "Profile Updated Successfully";
  } else {
    $_SESSION["toast"] = 0;
    $_SESSION["toastMessage"] = "Error Updating Profile";
  }
  echo "<script>window.location.href='../../UI/consumer/profile.php';</script>";
}

function displayProfile($con_id, $meter)
{
  $row = getUserDetails($con_id);
  $userAttr = getUserAttr($con_id, $meter);

  echo "<dl>
            <div class='bg-white border border-b border-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>
              <dt class='text-sm font-medium text-gray-500'>Name</dt>
              <span class='focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto' style='border:none;'>" . $row["name"] . "</span>
            </div>
            <div class='bg-white border border-b border-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>
              <dt class='text-sm font-medium text-gray-500'>Phone No</dt>
              <input type='text' name='consumer-phone' outline='none' value='" . $row["phone"] . "' class='focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto' style='border:none;'>
            </div>
            <div class='bg-white border border-b border-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>
              <dt class='text-sm font-medium text-gray-500'>Email</dt>
              <input type='email' name='consumer-email' outline='none' value='" . $row["email"] . "' class='focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto' style='border:none;'>
            </div>
            <div class='bg-white border border-b border-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>
              <dt class='text-sm font-medium text-gray-500'>Address</dt>
              <textarea disabled cols='3' rows='3' class='focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2' style='border:none;'>" . $userAttr["address"] . "</textarea>
            </div>
            <div class='bg-white border border-b border-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6'>
              <dt class='text-sm font-medium text-gray-500'>No Of Connections</dt>
              <span class='focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto' style='border:none;'>" . $userAttr["address"] . "</span>
            </div>
          </dl>";
}
