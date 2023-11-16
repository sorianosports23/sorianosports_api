<?php
  include_once "../database/connection.php";

  function messageForUser($username, $message){
    global $db;

    $response = [
      "message" => "",
      "status" => true
    ];

    $stmt = $db->prepare("INSERT INTO messageForUser(username, message) VALUES(?,?)");
    $stmt->bind_param('ss', $username, $message);
  
    if ($stmt->execute()) {
      $response["message"] = "Mensaje enviado correctamente";
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