<?php
  include_once "../database/connection.php";

  function modifyDirective($attr, $newDirective, $directiveID) {
    global $db;    

    $response = [
      "message" => "",
      "status" => false
    ];

    $query = "UPDATE directive SET $attr = '$newDirective' WHERE id = $directiveID";

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