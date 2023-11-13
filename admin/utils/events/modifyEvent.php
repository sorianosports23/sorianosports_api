<?php
  include_once "../database/connection.php";

  function modifyEvents($eventsID, $events, $newEvents) {
    global $db;    

    $response = [
      "message" => "",
      "status" => false
    ];

    $query = "UPDATE events SET $events = '$newEvents' WHERE id = '$eventsID'";

    if ($db->query($query)) {
      $response["message"] = "Evento editado correctamente";
      $response["status"] = true;
      $db->close();
      return $response;
    } else {
      $response["message"] = "Hubo un error al editar";
      $db->close();
      return $response;
    }
  }
?>
?>