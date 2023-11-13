<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // include_once "../utils/auth/eventsauth.php";

  include_once "../utils/cities/deleteCityPlace.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if ( empty($DATA["id"])){
    echo json_encode([
      "message" => "No ingresaste uno de los valores",
      "status" => false
    ]);
    die();
  }

  $id = $DATA["id"];

  echo json_encode(deleteCityPlace($id));
}
?>
