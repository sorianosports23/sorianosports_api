<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // include_once "../utils/auth/eventsauth.php";

  include_once "../utils/summerSport/modifySummerSport.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if (empty($DATA["id"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "id";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if (empty($DATA["newSummerSports"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "sports";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if (empty($DATA["newSummerSports"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "newSports";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  $sportsID = $DATA["id"];
  $sports = $DATA["sports"];
  $newSports = $DATA["newSports"];

  echo json_encode(modifySummerSports($sumemrSportsID, $summerSports, $newSummerSports));
}
?>