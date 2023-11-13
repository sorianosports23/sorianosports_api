<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // include_once "../utils/auth/eventsauth.php";

  include_once "../utils/events/daleteEvent.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if (empty($_POST["id"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "id";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  $id=$_DATA["id"];

  echo json_encode(deleteEvents($id));
}
?>