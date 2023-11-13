<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // include_once "../utils/auth/eventsauth.php";

  include_once "../utils/place/modifyKeywords.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if (empty($DATA["id"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "id";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if (empty($DATA["keyword"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "keyword";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if (empty($DATA["newKeyword"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "newKeyword";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }


  $keywordID = $DATA["id"];
  $keyword = $DATA["keyword"];
  $newKeyword = $DATA["newKeyword"];

  echo json_encode(modifyKeyword($keywordID, $keyword, $newKeyword));

}