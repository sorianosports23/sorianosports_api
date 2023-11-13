<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");

  if ($_SERVER["REQUEST_METHOD"] === "GET") {
    include_once "../utils/cities/getCitySport.php";

    if(empty($_GET["city"])){
      $response["message"] = "No se envio la ciudad";
      $response["input"] = "city";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }
   
    $city = $_GET["city"];

    echo json_encode(getCitySport($city));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "GET"
    ]);
  }
?>