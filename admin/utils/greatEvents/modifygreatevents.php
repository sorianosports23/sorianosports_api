<?php
  include_once "../database/connection.php";

  function modifyGreatEvents($greatEventID, $greatEvent, $newGreatEvent) {
    global $db;    

    $response = [
      "message" => "",
      "status" => false
    ];

    $query = "UPDATE greatEvents SET $greatEvent = '$newGreatEvent' WHERE id = '$greatEventID'";

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