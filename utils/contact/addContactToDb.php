<?php
 
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addContact($name, $email, $subject, $messageContact){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $status = 1;
    $stmt = $db->prepare("INSERT INTO contact(name, email, subject, messageContact, status) VALUES(?,?,?,?,?)");
    $stmt->bind_param('ssssi', $name, $email, $subject, $messageContact, $status);

    $res = $stmt->execute();


    if ($stmt->execute()) {
      $response["message"] = "Enviado Correctamente";
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