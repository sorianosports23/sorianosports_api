<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // include_once "../utils/auth/eventsauth.php";

  include_once "../utils/cities/deleteCityPlace.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if( empty($DATA["nameCity"])){
    $response["message"] = "No ingresaste ningún valor";
    $response["input"] = "nameCity";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if( empty($DATA["nameSport"])){
    $response["message"] = "No ingresaste ningún valor";
    $response["input"] = "nameSport";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  $nameCity = $DATA["nameCity"];
  $nameSport = $DATA["nameSport"];

  echo json_encode(deleteCityPlace($nameCity, $nameSport));
}
?>
