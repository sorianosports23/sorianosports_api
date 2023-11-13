<?php
  include_once "../database/connection.php";

  function deleteSports($id) {
    global $db;

    $response = [
      "menssage" => "",
      "status" => false
    ];

    $query = "DELETE FROM sports WHERE id = $id";

    if($db->query($query)){
      $response["message"] = "Deporte eliminado correctamente!";
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