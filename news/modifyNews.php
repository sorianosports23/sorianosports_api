<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

include_once "../auth/editor.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // include_once "../utils/auth/eventsauth.php";

  include_once "../utils/news/modifyNews.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if (!empty($_FILES["newNews"])) {
    $DATA = $_POST;
    $DATA["newNews"] = $_FILES["newNews"];
  }

  if (empty($DATA["newsID"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "id";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if (empty($DATA["News"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "News";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if (empty($DATA["newNews"])) {
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "newNews";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  $newsID = $DATA["newsID"];
  $News = $DATA["News"];
  $newNews = $DATA["newNews"];

  echo json_encode(modifyNews($newsID, $News, $newNews));
}
?>