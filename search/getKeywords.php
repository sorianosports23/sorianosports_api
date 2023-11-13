<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");

  if ($_SERVER["REQUEST_METHOD"] === "GET") {
    include_once "../utils/search/getKeywords.php";

    if (empty($_GET["search"])){
      echo json_encode([
        "status" => false,
        "message" => "Por favor ingrese el nombre",
      ]);
      die();
    }

    $searchName = $_GET["search"];

    echo json_encode(getKeyword($searchName));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "GET"
    ]);
  }
?>