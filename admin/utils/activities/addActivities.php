<?php
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addActivities(){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];


    $query = "INSERT INTO activities (name, place, sport, description, date_ev) VALUES ('$name', '$place', '$sport', '$description', $date_ev)";

    if ($db->query($query)) {
      $response["message"] = "Evento añadido";
      $response["status"] = true;
      $db->close();
      return $response;
    } else {
      $errMessage = getMessageError($db->errno);
      $response["message"] = $errMessage;
      $db->close();
      return $response;
    }
  }

?>