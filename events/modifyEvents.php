<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // include_once "../utils/auth/eventsauth.php";

  include_once "../utils/events/modifyEvent.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if (empty($DATA["eventID"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "EventID";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if (empty($DATA["event"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "event";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if (empty($DATA["newEvent"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "newEvent";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  $eventsID = $DATA["eventID"];
  $event = $DATA["event"];
  $newEvent = $DATA["newEvent"];

  echo json_encode(modifyEvents($eventsID, $event, $newEvent));
}
?>