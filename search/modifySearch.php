<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // include_once "../utils/auth/eventsauth.php";

  include_once "../utils/search/modifySearch.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if (empty($DATA["id"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "id";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if (empty($DATA["search"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "search";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if (empty($DATA["newSearch"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "newSearch";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }


  $searchID = $DATA["id"];
  $search = $DATA["search"];
  $newSearch = $DATA["newSearch"];

  echo json_encode(modifySearch($searchID, $search, $newSearch));
}