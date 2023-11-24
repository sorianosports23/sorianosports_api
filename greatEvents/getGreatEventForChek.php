<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");

  if ($_SERVER["REQUEST_METHOD"] === "GET") {
    include_once "../utils/place/getGreatEventsForCheck.php";

    if(!isset($_GET["check"])){
      $response["message"] = "No se ingreso Great Event";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    $check = $_GET["check"];

    echo json_encode(getGreatEventForCheck($check));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "GET"
    ]);
  }
?>