<?php
  include_once "../database/connection.php";

  function deleteNews($id) {
    global $db;

    $response = [
      "menssage" => "",
      "status" => false
    ];

    $query = "DELETE FROM news WHERE id = $id";

    if($db->query($query)){
      $response["message"] = "Noticia eliminada correctamente!";
      $response["status"] = true;
      $db->close();
      return $response;
    }
    else{
      $response["menssage"] = "No se pudo eliminar la Noticia!";
      $db->close();
      return $response;
    }
  }
?>