<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");

  if ($_SERVER["REQUEST_METHOD"] === "GET") {
    include_once "../utils/place/getPlace.php";

    if(empty($_GET["city"])){
      $response["message"] = "No se ingreso ciudad";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    $city = $_GET["city"];

    echo json_encode(getPlace($city));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "GET"
    ]);
  }
?>