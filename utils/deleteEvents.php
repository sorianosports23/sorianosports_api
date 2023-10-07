<?php
  include_once "../database/connection.php";

  function deleteEvent($id) {
    global $db;

    $response = [
      "menssage" => "",
      "status" => false
    ];

    $query = "DELETE FROM events WHERE id = $id";

    if($db->query($query)){
      $response["message"] = "Evento eliminado correctamente!";
      $response["status"] = true;
      $db->close();
      return $response;
    }
    else{
      $response["menssage"] = "No se pudo eliminar el evento!";
      $db->close();
      return $response;
    }
  }
?>