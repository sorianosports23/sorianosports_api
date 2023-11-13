<?php
  include_once "../database/connection.php";

  function deleteGreatEvents($id) {
    global $db;

    $response = [
      "menssage" => "",
      "status" => false
    ];

    $query = "DELETE FROM greatEvents WHERE id = $id";

    if($db->query($query)){
      $response["message"] = "Evento eliminado correctamente!";
      $response["status"] = true;
      $db->close();
      return $response;
    }
    else{
      $response["menssage"] = "No se pudo eliminar!";
      $db->close();
      return $response;
    }
  }
?>