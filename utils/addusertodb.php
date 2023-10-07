<?php
  include_once "../database/connection.php";
  include_once "errorcodes.php";

  function addUser($username, $fullname, $password, $email, $age, $ci, $phone){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users VALUES ('$username', '$fullname', '$hashedPassword', '$email', $age, $ci, $phone)";

    if ($db->query($query)) {
      $response["message"] = "Registrado correctamente";
      $response["status"] = true;
      $db->close();
      return $response;
    } else {
      $errMessage = getMessageError($db->errno);
      $response["message"] = $errMessage;
      $db->close();
      return $response;
    }
  }

?>