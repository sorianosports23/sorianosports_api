<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

include_once "../auth/admin.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // include_once "../utils/auth/eventsauth.php";

  include_once "../utils/cities/modifyCity.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if (empty($DATA["faqID"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "faqID";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if ( empty($DATA["name"])){
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "name";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if ( empty($DATA["newName"])){
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "newName";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }


  $faqID = $DATA["id"];
  $name = $DATA["name"];
  $newName = $DATA["newName"];

  echo json_encode(modifyFaq($faqID, $name, $newName));
}
?>