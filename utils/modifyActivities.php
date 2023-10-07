<?php
  include_once "../database/connection.php";

  function modifyActivities($eventToEdit, $event, $newEvent) {
    global $db;    

    $response = [
      "message" => "",
      "status" => false
    ];

    $query = "UPDATE users SET $value = '$newEvent' WHERE username = '$eventToEdit'";

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