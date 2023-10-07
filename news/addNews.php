<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // include_once "../utils/userauth.php";
    /* include_once "../utils/auth/newsauth.php"; */

    $DATA = json_decode(file_get_contents("php://input", true), true);

    if (!isset($DATA["name"]) || !isset($DATA["img"]) || !isset($DATA["description"]) || !isset($DATA["note"])) {
      echo json_encode([
        "message" => "No ingresaste uno de los valores",
        "status" => false
      ]);
      die();
    }

    $name = $DATA["name"];
    $img = $DATA["img"];
    $description = $DATA["description"];
    $note = $DATA["note"];

    include_once "../utils/news/addNews.php";

    echo json_encode(addNews($name, $img, $description, $note));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "POST"
    ]);
  }
?>