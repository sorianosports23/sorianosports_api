<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  include_once "../utils/auth/eventsauth.php";

  include_once "../utils/events/addEvent.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if ( !isset($DATA["name"]) || !isset($DATA["place"]) || !isset($DATA["time"]) || !isset($DATA["sport"]) || !isset($DATA["description"]) || !isset($DATA["date_ev"])){
    echo json_encode([
      "message" => "No ingresaste uno de los valores",
      "status" => false
    ]);
    die();
  }

  $name = $DATA["name"];
  $place = $DATA["place"];
  $time = $DATA["time"];
  $sport = $DATA["sport"];
  $description = $DATA["description"];
  $date_ev = $DATA["date_ev"];

  echo json_encode(addEvent($name, $place, $time, $sport, $description, $date_ev));
}
?>
