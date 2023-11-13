<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // include_once "../utils/auth/eventsauth.php";

  include_once "../utils/greatEvents/modifygreatevents.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if (empty($_POST["greatEventID"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "greatEventID";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if (empty($_POST["greatEvent"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "cityID";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if (empty($_POST["newGreatEvent"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "cityID";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  $greatGreatEventsID = $DATA["id"];
  $greatEvent = $DATA["greatEvent"];
  $newGreatEvent = $DATA["newGreatEvent"];

  echo json_encode(modifyGreatEvents($greatEventID, $greatEvent, $newGreatEvent));
}
?>