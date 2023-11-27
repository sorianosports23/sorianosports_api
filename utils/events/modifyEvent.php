<?php
  include_once "../database/connection.php";

  function modifyEvents($eventsID, $events, $newEvent) {
    global $db;    

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("UPDATE event SET $events = ? WHERE id = ?");

    if ($events === "image") {
      $img = serialize(file_get_contents($newEvent["tmp_name"]));
      $stmt->bind_param("si", $img, $eventsID);
    } else if ($events === "check_Great") {
      $stmt->bind_param("ii", $newEvent, $eventsID);
    } else {
      $stmt->bind_param("si", $newEvent, $eventsID);
    }

    // $stmt->bind_param('si', $newEvent, $eventsID);
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
