<?php
  include_once "../database/connection.php";

  function deletePermissionForUser($username){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("DELETE FROM permission WHERE username = ?");
    $stmt->bind_param('s', $username);

    if($stmt->execute()){
      $response["message"] = "Eliminado Correctamente";
      $response["status"] = true;
      return $response;
    }
    else{
      $response["message"] = $stmt->error;
      $db->close();
      return $response;
    }
  }
?>