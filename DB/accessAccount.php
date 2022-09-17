<?php
  include("dbConnection.php");

  function getLatestConsumerId() {
    //get the last added consumerID
    $query = "SELECT consumer_id FROM users ORDER BY consumer_id DESC LIMIT 1";
    $result = $GLOBALS['conn']->query($query);
    $row = $result->fetch_assoc();
    return $row["consumer_id"] + 1;
  }

  function addNewUser($consumer_id, $email, $pwd, $name, $phone) {
    $query = "INSERT INTO Users Values ($consumer_id, '$email', '$pwd', '$name', $phone, 0)";
    if ($GLOBALS['conn']->query($query) === TRUE) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  function validateUser($email, $pwd) {
    //get the user with input email
    $q = "SELECT consumer_id, pwd, is_admin FROM users WHERE email = '$email'";
    $res = $GLOBALS['conn']->query($q);

    if (mysqli_num_rows($res) == 0) {
      return array("No User Found", 0, -1, -1);
    } else {
      //check password match
      $r = $res->fetch_assoc();
      if (password_verify($_POST["password"], $r["pwd"])) {
        return array("User Verified", 1, $r["consumer_id"], $r["is_admin"]);
      } else {
        return array("Password Incorrect", -1, -1, -1);
      }
    }
  }
?>