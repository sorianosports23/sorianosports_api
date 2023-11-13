<?php
  include_once "../database/connection.php";

  function modifyPermission($permission, $username){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("INSERT INTO permission (username, permission)VALUES(?,?)");
    $stmt->bind_param('ss', $username, $permission );

    if($stmt->execute()){
      $response["message"] = "Permisos editados correctamente";
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