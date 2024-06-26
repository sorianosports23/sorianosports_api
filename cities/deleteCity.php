<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

include_once "../auth/admin.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // include_once "../utils/auth/eventsauth.php";

  include_once "../utils/cities/deleteCity.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if (empty($DATA["nameCity"])) {
    $response["message"] = "No ingresaste ningún valor";
    $response["input"] = "nameCity";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if (empty($DATA["nameSport"])) {
    $response["message"] = "No ingresaste ningún valor";
    $response["input"] = "nameSport";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if (empty($DATA["typeSport"])) {
    $response["message"] = "No ingresaste ningún valor";
    $response["input"] = "typeSport";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }


  $nameCity = $DATA["nameCity"];
  $nameSport = $DATA["nameSport"];
  $typeSport = $DATA["typeSport"];

  echo json_encode(deleteCityPlace($nameCity, $nameSport, $typeSport));
}