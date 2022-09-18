<?php
  include("../DB/accessAccount.php");
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  define("ERROR_MSG", 0);
  define("ERROR_CODE", 1);
  define("CONSMR_ID", 2);
  define("IS_ADMIN", 3);

  if (isset($_GET["logout"])) {
    setcookie("consumer", "", time() - 3600, '/');
  } elseif (isset($_COOKIE["consumer"])) {
    $_SESSION["consumer"] = $_COOKIE["consumer"];
    echo "<script>window.location.href='consumer/index.php';</script>";
  }
  unset($_SESSION["meter_num"]);
  unset($_SESSION["consumer"]);
  unset($_SESSION["is_admin"]);

  if (isset($_POST['Register'])) {
    registerUser();
  } elseif (isset($_POST["Login"])) {
    loginUser();
  }

  function registerUser() {
    echo "<BR>email: " . $_POST["email"];
    echo "<BR>name: " . $_POST["name"];
    echo "<BR>phone: " . $_POST["phone"];
    echo "<BR>pwd: " . $_POST["password"];

    $email = $_POST["email"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];

    $pwd = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $consumer_id = getLatestConsumerId();
    echo "<BR>consumer_id: " . $consumer_id;

    $userAdded = addNewUser($consumer_id, $email, $pwd, $name, $phone);
    if ($userAdded) {
      $_SESSION["consumer"] = $consumer_id;
      echo "<script>window.location.href='../UI/consumer/index.php';</script>";
    } else {
      echo "<script>
            alert('Error Registering User');
            window.location.href='../UI/login.php';
            </script>";
    }
  }

  function loginUser() {
    $email = $_POST["email"];
    $pwd = $_POST["password"];
    // echo "<BR>Email: ".$email;
    // echo "<BR>Password: ".$pwd;

    $result = validateUser($email, $pwd);
    if($result[ERROR_CODE] != 1) {
      $_SESSION["toast"] = 0;
      if ($result[ERROR_CODE] == 0) {
        $_SESSION["toastMessage"] = "No User Found";
      } else {
        $_SESSION["toastMessage"] = "Password Incorrect";
      }
    } else {
      $_SESSION["toast"] = 1;
      $_SESSION["toastMessage"] = "Login Successful";
      if (isset($_POST["remember-me"])) {
        setcookie('consumer', $result[CONSMR_ID], time() + 60 * 60 * 24 * 365, '/');
      }
      if ($result[IS_ADMIN] == 1) {
        $_SESSION["is_admin"] = TRUE;
        echo "<script>
        window.location.href='../UI/admin/index.php';</script>";
      } else {
        $_SESSION["consumer"] = $result[CONSMR_ID];
        echo "<script>window.location.href='../UI/consumer/index.php';</script>";
      }
    }
  }
?>
