<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

include_once "../auth/admin.php";

if($_SERVER["REQUEST_METHOD"] === "GET"){
  include_once "../utils/users/getSearchCi.php";

  if(empty($_GET["ci"])){
    $response["message"] = "Ingrese datos";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  $ci = $_GET["ci"];

  echo json_encode(getSearchCi($ci));

}
?>