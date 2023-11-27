<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  include_once "../auth/admin.php";

  if($_SERVER["REQUEST_METHOD"] === "POST"){
    include_once "../utils/users/deletePermission.php";

    $DATA = json_decode(file_get_contents("php://input", true), true);

    if(empty($DATA["username"])){
      $response["message"] = "No ingresaste ningun valor";
      $response["input"] = "username";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(empty($DATA["permission"])){
      $response["message"] = "No ingresaste ningun valor";
      $response["input"] = "permission";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    $username = $DATA["username"];
    $permission = $DATA["permission"];

    echo json_encode(deletePermission($username, $permission));
  }
?>