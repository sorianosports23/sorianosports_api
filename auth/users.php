<?php
  include_once "../utils/auth/usersauth.php";

  $askPermission = askPermission($username);

  if(!$askPermission){
    $response["message"] = "No estas autorizado!";
    $response["status"] = false;
    $response["authorization"] = false;
    echo json_encode($response);
    die();
  }
  
?>