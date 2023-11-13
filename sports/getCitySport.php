<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");

  if ($_SERVER["REQUEST_METHOD"] === "GET") {
    include_once "../utils/sports/getCitySport.php";

    if(empty($_GET["sport"])){
      $response["message"] = "No se envio la ciudad";
      $response["input"] = "sport";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }
   
    $sport = $_GET["sport"];

    echo json_encode(getCitySport($sport));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "GET"
    ]);
  }
?>