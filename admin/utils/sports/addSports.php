<?php
 
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addSports($name, $city){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];


    $query = "INSERT INTO sports (name, city) VALUES ('$name', '$city')";

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