<?php
session_start();
$var = $_SESSION['data'];
header("Location: bills.php");

?>
<!DOCTYPE html>
<html>

<head>
    <title>Thank You</title>
</head>

<body class="">
    <br><br><br><br>
    <article class="bg-secondary mb-3">
        <div class="card-body text-center">
            <h4 class="text-white">Thank you for payment <?php echo $var["payment_id"] ?><br></h4>
            <br>
            <p><a class="btn btn-warning" target="_blank">
                    <i class="fa fa-window-restore "></i></a></p>
        </div>
        <br><br><br>
    </article>

</body>

</html>