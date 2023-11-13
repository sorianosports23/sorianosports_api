<?php
   header("Content-Type: application/json");
   header("Access-Control-Allow-Origin: *");

   if($_SERVER["REQUEST_METHOD"] === "GET") {
    
    if(empty(["cityPlaceID"])){
      $response["message"] = "No ingreso ID";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    $cityPlaceID = $_GET["cityPlaceID"];
    include_once  "../utils/cities/getCityID.php";

    echo json_encode(getCityPlace($cityPlaceID));
  }
  else{
    echo json_encode([
      "message" => "Metodo equivocado para la petición",
      "correct_method" => "GET",
    ]);

  }
?>