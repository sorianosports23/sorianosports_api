<?php
   header("Content-Type: application/json");
   header("Access-Control-Allow-Origin: *");

   if($_SERVER["REQUEST_METHOD"] === "GET") {
    if(!isset($_GET["activitiesID"])){
      echo json_encode([
        "status" => false,
        "message" => "Por favor ingrese ID";

      ]);
      die();
    }

    $activitiesID = $_GET["activitiesID"];
    include_once  "../utils/activities/getactivitiesID.php";

    echo json_encode(getActivities($activitiesID));
  }
  else{
    echo json_encode([
      "message" => "Metodo equivocado para la petición",
      "correct_method" => "GET";
    ]);

  }
?>