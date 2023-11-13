<?php
   header("Content-Type: application/json");
   header("Access-Control-Allow-Origin: *");

   if($_SERVER["REQUEST_METHOD"] === "GET") {
    if(!isset($_GET["sportsID"])){
      echo json_encode([
        "status" => false,
        "message" => "Por favor ingrese ID",
      ]);
      die();
    }

    $sportsID = $_GET["sportsID"];
    include_once  "../utils/sports/getSportsID.php";

    echo json_encode(getSports($sportsID));
  }
  else{
    echo json_encode([
      "message" => "Metodo equivocado para la petición",
      "correct_method" => "GET",
    ]);

  }
?>