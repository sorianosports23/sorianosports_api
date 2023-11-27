<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Content-Type, Authorization");
 
  include_once "../auth/admin.php";

  if($_SERVER["REQUEST_METHOD"] === "POST"){
    
    include_once "../utils/users/modifyPermission.php";

    $DATA = json_decode(file_get_contents("php://input", true), true);

    if(empty($DATA["permission"])){
      $response["message"] = "No se ingreso el valor";
      $response["input"] = "permission";
      $response["status"]  = false;
      echo json_encode($response);
      die();
    }

    if(empty($DATA["username"])){
      $response["message"] = "No se ingreso el valor";
      $response["input"] = "username";
      $response["status"]  = false;
      echo json_encode($response);
      die();
    }

    $permission = $DATA["permission"];
    $username = $DATA["username"];

    if($permission != "admin" && $permission != "editor"){
      $response["message"] = "No se puede asignar este permiso";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    echo json_encode(modifyPermission($permission, $username));

  }
?>