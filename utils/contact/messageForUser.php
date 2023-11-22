<?php

  include_once "../database/connection.php";

  function messageForUser($id, $message){
    global $db;

    $response = [
      "message" => "",
      "status" => true
    ];

    $stmt = $db->prepare("INSERT INTO messageForUser(id, message) VALUES(?,?)");
    $stmt->bind_param('is', $id, $message);
  
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