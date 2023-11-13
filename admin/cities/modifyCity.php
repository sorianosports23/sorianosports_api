<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // include_once "../utils/auth/eventsauth.php";

  include_once "../utils/cities/modifyCity.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if (empty($_POST["cityID"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "cityID";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if ( empty($_POST["city"])){
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "city";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if ( empty($_POST["newCity"])){
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "newCity";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }


  $directiveID = $_DATA["id"];

  echo json_encode(modifyCity($cityID, $city, $newCity));
}
?>