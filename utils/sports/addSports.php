<?php
 
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addSports($name, $city, $typeSport){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];


    $stmt = $db->prepare("INSERT INTO cityPlace(nameSport, nameCity, typeSport) VALUES(?, ?, ?)");
    $stmt->bind_param('sss', $name, $city, $typeSport);

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