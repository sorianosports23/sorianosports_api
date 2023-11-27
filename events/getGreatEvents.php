<?php
   header("Content-Type: application/json");
   header("Access-Control-Allow-Origin: *");

   if($_SERVER["REQUEST_METHOD"] === "GET") {
    if(!isset($_GET["check"])){
      echo json_encode([
        "status" => false,
        "message" => "ocurrio un error",
      ]);
      die();
    }

    $check = $_GET["check"];
    include_once  "../utils/events/getGreatEvents.php";

    echo json_encode(getGreatEvent($check));
  }
  else{
    echo json_encode([
      "message" => "Metodo equivocado para la petición",
      "correct_method" => "GET",
    ]);

  }
?>