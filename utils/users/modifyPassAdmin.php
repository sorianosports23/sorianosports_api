<?php
  include_once "../database/connection.php";


  function modifyPassAdmin($newPassword, $username){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $stmt = $db->prepare("UPDATE users SET password = ? WHERE username = ? ");
    $stmt->bind_param('ss', $hashedPassword, $username);

    if ($stmt->execute()) {
      $response["message"] = "Contraseña editada";
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