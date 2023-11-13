<?php
  include_once "../database/connection.php";

  function deleteUser($username) {
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $query = "DELETE FROM users WHERE username = '$username'";

    if ($db->query($query)) {
      $response["message"] = "Usuario eliminado correctamente";
      $response["status"] = true;
      $db->close();
      return $response;
    }
    else{
      $response["message"] = "No se pudo eliminar el usuario";
      $db->close();
      return $response;
    }
  }
?>