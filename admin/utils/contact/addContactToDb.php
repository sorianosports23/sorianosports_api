<?php
 
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addContact($name, $email, $subject, $messageContact){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];


    $query = "INSERT INTO contact (name, correo, subject, mensaje) VALUES ('$name', '$email', '$subject', '$messageContact')";

    if ($db->query($query)) {
      $response["message"] = "Mensaje mandado correctamente";
      $response["status"] = true;
      $db->close();
      return $response;
    } else {
      // $errMessage = getMessageError($db->errno);
      $response["message"] = $db->error;
      $db->close();
      return $response;
    }
  }

?>