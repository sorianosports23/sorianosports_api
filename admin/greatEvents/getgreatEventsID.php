<?php
   header("Content-Type: application/json");
   header("Access-Control-Allow-Origin: *");

   if($_SERVER["REQUEST_METHOD"] === "GET") {
    if(!isset($_GET["greatEventsID"])){
      echo json_encode([
        "status" => false,
        "message" => "Por favor ingrese ID",
      ]);
      die();
    }

    $greatEventsID = $_GET["greatEventsID"];
    include_once  "../utils/greatEvents/getGreatEventsID.php";

    echo json_encode(getGreatEvents($greatEventsID));
  }
  else{
    echo json_encode([
      "message" => "Metodo equivocado para la petición",
      "correct_method" => "GET",
    ]);

  }
?>