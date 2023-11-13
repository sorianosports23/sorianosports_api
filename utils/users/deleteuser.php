<?php
  include_once "../database/connection.php";

  function deleteUser($username) {
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("DELETE FROM users WHERE username = ?");
    $stmt->bind_param('s', $username );


    if ($stmt->execute()) {
      $response["message"] = "Eliminado Correctamente";
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