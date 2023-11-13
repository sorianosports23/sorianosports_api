<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

if($_SERVER["REQUEST_METHOD"] === "GET"){
  include_once "../utils/users/getSearchUser.php";

  if(empty($_GET["username"])){
    $response["message"] = "Ingrese";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  $username = $_GET["username"];

  echo json_encode(getSearchUser($username));

}
?>