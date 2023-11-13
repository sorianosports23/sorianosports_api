<?php
   header("Content-Type: application/json");
   header("Access-Control-Allow-Origin: *");

   if($_SERVER["REQUEST_METHOD"] === "GET") {

    include_once  "../utils/summerSports/getSummerSportsID.php";

    if(empty($_GET["summerSportsID"])){
      $response["message"] = "Por favor ingrese ID";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    $summerSportsID = $_GET["summerSportsID"];
   
    echo json_encode(getSummerSports($summerSportsID));
  }
  else{
    echo json_encode([
      "message" => "Metodo equivocado para la petición",
      "correct_method" => "GET",
    ]);

  }
?>