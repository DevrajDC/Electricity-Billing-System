<?php
session_start();
$data = [
        'user_id' => '1',
        'payment_id' => $_POST['razorpay_payment_id'],
        'amount' => $_POST['totalAmount'],
        'msg' => 'Payment successfully credited',
        'status' => true,
        'billNum' => $_POST["billNum"]
];
$_SESSION['data'] = $data;
$arr = array('msg' => 'Payment successfully credited', 'status' => true);
echo json_encode($arr);
