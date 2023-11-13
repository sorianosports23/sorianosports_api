<?php
  include_once "../database/connection.php";

  function modifyEvents($eventsID, $events, $newEvent) {
    global $db;    

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("UPDATE event SET $events = ? WHERE id = ?");
    $stmt->bind_param('si', $newEvent, $eventsID);
    //stmt = "UPDATE city SET $city = ? WHERE id = ?;
    

    if ($stmt->execute()) {
      $response["message"] = "Evento editado";
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
