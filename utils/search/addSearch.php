<?php
 
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addSearch($name, $to, $description){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];


    $stmt = $db->prepare("INSERT INTO search (name, url, description) VALUES (?,?,?)");
    $stmt->bind_param("sss", $name, $to, $description);

    if ($stmt->execute()) {
      $response["message"] = "Añadido correctamente";
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