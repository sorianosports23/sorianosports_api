<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // include_once "../utils/auth/eventsauth.php";

  include_once "../utils/socialMedia/modifySocialMedia.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if (empty($DATA["name"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "name";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if (empty($DATA["newLink"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "newLink";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  $name = $DATA["name"];
  $newLink = $DATA["newLink"];

  echo json_encode(modifySocialMedia($name, $newLink));
}