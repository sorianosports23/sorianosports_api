<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");

  if ($_SERVER["REQUEST_METHOD"] === "GET") {
    include_once "../utils/cities/getCityForSport.php";

    if(empty($_GET["citySport"])){
      $response["message"] = "No hay ningun registro";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    $citySport = $_GET["citySport"];
  

    echo json_encode(getCityForSport($citySport));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "GET"
    ]);
  }
?>