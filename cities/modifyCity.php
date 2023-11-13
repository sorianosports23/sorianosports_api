<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // include_once "../utils/auth/eventsauth.php";

  include_once "../utils/cities/modifyCity.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if (empty($DATA["cityPlaceID"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "cityID";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if ( empty($DATA["cityPlace"])){
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "city";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if ( empty($DATA["newCityPlace"])){
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "newCity";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }


  $cityPlaceID = $DATA["id"];
  $cityPlace = $DATA["cityPlace"];
  $newCityPlace = $DATA["newCity"];

  echo json_encode(modifyCityPlace($cityPlaceID, $cityPlace, $newCityPlace));
}
?>