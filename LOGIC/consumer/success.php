<?php
  include("../../DB/consumer/UI.php");
  if (session_status() === PHP_SESSION_NONE) {
    session_start();  
  }
  if(isset($_SESSION['data'])) {
    $var = $_SESSION['data'];
    $result = updateBillPayment($_SESSION['data']);
    if ($result) {
      $_SESSION["toast"] = 1;
      $_SESSION["toastMessage"] = "Payment Successful<br>Bill Updated";
    } else {
      $_SESSION["toast"] = 0;
      $_SESSION["toastMessage"] = "Error Updating Bill";
    }
  }
  header("refresh:5;url=../../UI/consumer/bills.php");
?>
<!DOCTYPE html>
<html>

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Thank You</title>
</head>

<body class="">
    <!-- component -->
    <div class="bg-gray-100 f-screen">
        <div class="bg-white p-6 md:mx-auto">
            <svg viewBox="0 0 24 24" class="text-green-600 w-16 h-16 mx-auto my-6">
                <path fill="currentColor" d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z"></path>
            </svg>
            <div class="text-center">
                <h2 class="md:text-2xl text-base text-gray-900 font-semibold text-center">
                    Payment Done!
                </h2>
                <br>
                <h4>Transaction Id: <?php echo $var["payment_id"] ?></h4>
                <p class="text-gray-600 my-2">
                    Thank you for completing your secure online payment.
                </p>
                <p>Have a great day!</p>
                <div class="py-10 text-center">
                    <a href="../../UI/consumer/bills.php" class="px-12 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-3">
                        GO BACK
                    </a>
                </div>
                <div class="text-sm text-gray-600">
                    Redirecting to bills page in <span id="timer">3</span> seconds
                </div>
            </div>
        </div>
    </div>


    
<script type="text/javascript">

(function () {
    var timeLeft = 5,
        cinterval;

    var timeDec = function (){
        timeLeft--;
        document.getElementById('timer').innerHTML = timeLeft;
        if(timeLeft === 0){
            clearInterval(cinterval);
        }
    };
    cinterval = setInterval(timeDec, 1000);
})();

</script>

</body>

</html>