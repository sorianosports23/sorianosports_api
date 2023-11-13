<?php
  include_once "../database/connection.php";

  function modifyCity($cityID, $city, $newCity) {
    global $db;    

    $response = [
      "message" => "",
      "status" => false
    ];

    $query = "UPDATE city SET $city = '$newCity' WHERE id = '$cityID'";

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