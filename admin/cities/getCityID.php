<?php
   header("Content-Type: application/json");
   header("Access-Control-Allow-Origin: *");

   if($_SERVER["REQUEST_METHOD"] === "GET") {
    if(!isset($_GET["citiesID"])){
      echo json_encode([
        "status" => false,
        "message" => "Por favor ingrese ID",
      ]);
      die();
    }

    $citiesID = $_GET["citiesID"];
    include_once  "../utils/cities/getCityID.php";

    echo json_encode(getCity($citiesID));
  }
  else{
    echo json_encode([
      "message" => "Metodo equivocado para la petición",
      "correct_method" => "GET",
    ]);

  }
?>