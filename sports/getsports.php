<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");

  if ($_SERVER["REQUEST_METHOD"] === "GET") {
    include_once "../utils/sports/getSports.php";

    $pag = 0;

    if (empty($_GET["pag"])) {
      $pag = $_GET["pag"] - 1;
    }

    echo json_encode(getSports($pag));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "GET"
    ]);
  }
?>