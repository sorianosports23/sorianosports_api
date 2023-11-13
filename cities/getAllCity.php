<?php
   header("Content-Type: application/json");
   header("Access-Control-Allow-Origin: *");

   if($_SERVER["REQUEST_METHOD"] === "GET") {

    include_once  "../utils/cities/getAllCity.php";

    if(empty($_GET["allCity"])){
      $response["message"] = "No hay registros";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    $allCity = $_GET["allCity"];

    echo json_encode(getAllCity($allCity));
  }
  else{
    echo json_encode([
      "message" => "Metodo equivocado para la petición",
      "correct_method" => "GET",
    ]);

  }
?>