<?php
  include_once "../database/connection.php";

  function modifySports($sportsID, $Sports, $newSports) {
    global $db;    

    $response = [
      "message" => "",
      "status" => false
    ];

    $query = "UPDATE sports SET $Sports = '$newSports' WHERE id = '$sportsID'";

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