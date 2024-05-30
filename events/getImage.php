<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
  if (empty($_GET["id"])) {
    $response["message"] = "No se envio el id";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  include_once "../utils/events/getImage.php";

  $id = $_GET["id"];

  $image = getImage($id);

  if (!empty($image["status"])) {
    header("Content-Type: application/json");
    echo json_encode($image);
    die();
  }

  $CONTENT_TYPE = "Content-Type: " . $image["imgType"];


  header($CONTENT_TYPE);
  $imageData = stream_get_contents($image["img"]);
  echo $imageData;
} else {
  echo json_encode([
    "message" => "Metodo equivocado para la peticion",
    "correct_method" => "GET"
  ]);
}