<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // include_once "../utils/auth/eventsauth.php";

  include_once "../utils/directive/modifyDirective.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if (!empty($_FILES["newDirective"])) {
    $DATA = $_POST;
    $DATA["newDirective"] = $_FILES["newDirective"];
  } 

  if (empty($DATA["DirectiveID"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "DirectiveID";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if (empty($DATA["newDirective"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "newDirective";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if (empty($DATA["attr"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "attr";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  $directiveID = $DATA["DirectiveID"];
  $newDirective;

  if (!empty($_FILES["DirectiveID"])) {
    $newDirective = $_FILES["DirectiveID"];
  } else {
    $newDirective = $DATA["newDirective"];
  }

  $attr = $DATA["attr"];
  $newDirective = $DATA["newDirective"];
  $directiveID = $DATA["DirectiveID"];

  echo json_encode(modifyDirective($attr, $newDirective, $directiveID));
}
?>
