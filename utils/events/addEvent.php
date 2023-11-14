<?php
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addEvent($name, $place, $time, $sport, $description, $date_ev){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];


    $stmt = $db->prepare("INSERT INTO event(name, place, time, sport, description, date_ev) VALUES(?,?,?,?,?,?)");
    $stmt->bind_param('ssssss', $name, $place, $time, $sport, $description, $date_ev);

    if ($stmt->execute()) {
      $response["message"] = "Evento añadido";
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