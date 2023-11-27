<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

include_once "../auth/admin.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // include_once "../utils/auth/eventsauth.php";

  include_once "../utils/faq/modifyFaqRes.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if (empty($DATA["faqID"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "faqID";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if ( empty($DATA["response"])){
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "response";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if ( empty($DATA["newResponse"])){
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "newResponse";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }


  $faqID = $DATA["id"];
  $response = $DATA["response"];
  $newResponse = $DATA["newResponse"];

  echo json_encode(modifyFaqRes($faqID, $response, $newResponse));
}
?>