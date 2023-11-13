<?php
  include_once "../database/connection.php";

  function modifyUser($usernameToEdit, $value, $newValue) {
    global $db;    

    $responseModify = [
      "message" => "",
      "status" => false
    ];

    $query = "UPDATE users SET $value = '$newValue' WHERE username = '$usernameToEdit'";

    if ($db->query($query)) {
      $responseModify["message"] = "Editado correctamente";
      $responseModify["status"] = true;
      // $db->close();
      return $responseModify;
    } else {
      $responseModify["message"] = "Hubo un error al editar";
      // $db->close();
      return $responseModify;
    }
  }
?>