<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");

  if ($_SERVER["REQUEST_METHOD"] === "GET") {
    include_once "../utils/activities/getactivities.php";

    echo json_encode(getEvents());
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "GET"
    ]);
  }
?>