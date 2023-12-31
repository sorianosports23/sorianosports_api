<?php
 
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addSummerSports($name, $city){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];


    $stmt = $db->prepare("INSERT INTO summerSport(name, city) VALUES(?, ?)");
    $stmt->bind_param('ss', $name, $city);


    if ($stmt->execute()) {
      $response["message"] = "Deporte añadido";
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