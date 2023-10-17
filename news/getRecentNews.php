<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json");

  if ($_SERVER["REQUEST_METHOD"] === "GET") {
    include_once "../utils/news/getRecentsNews.php";
    echo json_encode(getNews());
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "GET"
    ]);
  }
?>