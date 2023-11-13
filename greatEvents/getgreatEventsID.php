<?php
   header("Content-Type: application/json");
   header("Access-Control-Allow-Origin: *");

   if($_SERVER["REQUEST_METHOD"] === "GET") {
    if(empty($_GET["greatEventsID"])){
      $response["message"] = "No ingreso ID";
      $response["status"] = false;
      echo json_encode($response);
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