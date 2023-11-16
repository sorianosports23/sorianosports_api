<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // include_once "../utils/auth/eventsauth.php";

  include_once "../utils/place/modifyPlace.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if (empty($DATA["id"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "id";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if (empty($DATA["place"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "place";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if (empty($DATA["newPlace"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "newPlace";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }


  $placeID = $DATA["id"];
  $place = $DATA["place"];
  $newPlace = $DATA["newPlace"];

  echo json_encode(modifyPlace($placeID, $place, $newPlace));
}