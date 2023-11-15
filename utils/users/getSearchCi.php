<?php
  include_once "../database/connection.php";
  include_once "getPermissions.php";

  function getSearchCi($ci){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("SELECT username, fullname, email, age, ci, phone FROM users WHERE ci = ?");
    $stmt->bind_param('i', $ci);

    if($stmt->execute()){
      $result = $stmt->get_result();
      $user = $result->fetch_assoc();
      $user["permissions"] = getPermissionsFromUser($user["username"]);
      $response["data"] = $user;
      $response["status"] = true;
      $db->close();
      return $response;
    }
    else{
      $response["messege"] = "No se encontro el usuario o no existe, porfavor revise su entrada";
      $db->close();
      return $response;
    }
  }
?>