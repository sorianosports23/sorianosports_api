<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

include_once "../auth/admin.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // include_once "../utils/auth/eventsauth.php";

  include_once "../utils/search/deleteKeywords.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if (empty($DATA["id"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "id";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if (empty($DATA["name"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "name";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  $id = $DATA["id"];
  $name = $DATA["name"];
  
  echo json_encode(deleteKeyword($id, $name));
}
?>