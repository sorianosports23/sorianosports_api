<?php
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addEvent($name, $place, $time, $sport, $description, $date_ev){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];


    $query = "INSERT INTO event (name, place, sport, description, date_ev) VALUES ('$name', '$place', '$sport', '$description', $date_ev)";

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