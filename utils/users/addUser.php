<?php
 
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addUser($username, $fullname, $password, $email, $age, $ci, $phone){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];


    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $db->prepare("INSERT INTO users(username, fullname, password, email, age, ci, phone) VALUES(?,?,?,?,?,?,?)");
    $stmt->bind_param('ssssiii', $username, $fullname, $hashedPassword, $email, $age, $ci, $phone);

    if ($stmt->execute()) {
      $response["message"] = "Usuario añadido";
      $response["status"] = true;
      $db->close();
      return $response;
    } else {
      // $errMessage = getMessageError($db->errno);
      $response["message"] = $stmt->error;
      $db->close();
      return $response;
    }
  }

?>