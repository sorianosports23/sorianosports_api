<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // include_once "../utils/auth/eventsauth.php";

  include_once "../utils/contact/editStatus.php";
  
  $DATA = json_decode(file_get_contents("php://input", true), true);

  if (empty($DATA["id"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "id";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if ( empty($DATA["status"])){
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "status";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if ( empty($DATA["newStatus"])){
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "newStatus";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }


  $id = $DATA["id"];
  $status = $DATA["status"];
  $newStatus = $DATA["newStatus"];

  echo json_encode(editStatus($id, $status, $newStatus));
}
?>