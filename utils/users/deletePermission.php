<?php
  include_once "../database/connection.php";

  function deletePermission($username, $permission){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("DELETE FROM permission WHERE username = ? AND permission = ?");
    $stmt->bind_param('ss', $username, $permission);

    if($stmt->execute()){
      $response["message"] = "Permiso eliminado Correctamente";
      $response["status"] = true;
      $db->close();
      return $response;
    }
    else{
      $response["message"] = $stmt->error;
      $db->close();
      return $response;
    }
  }

  function deletePermissionForUsers($username){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("DELETE FROM permission WHERE username = ?");
    $stmt->bind_param('s', $username);

    if($stmt->execute()){
      $response["message"] = "Eliminado correctamente";
      $response["status"] = false;
      $db->close();
      return $response;
    }
    else{
      $response["message"] = $stmt->error;
      $db->close();
      return $response;
    }
  }
?>