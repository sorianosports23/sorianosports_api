<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");
  
  if($_SERVER["REQUEST_METHOD"] === "POST") {
    // include_once "../utils/activitiesauth.php";
  
  
    $DATA = json_decode(file_get_contents("php://input", true), true);
  
    if (empty($DATA["name"]) || empty($DATA["place"]) || empty($DATA["sport"]) || empty($DATA["description"])){
      echo json_encode([
        "message" => "No ingresaste uno de los valores",
        "status" => false
      ]);
      die();
    }

    $name = $DATA["name"];
    $place = $DATA["place"];
    $sport = $DATA["sport"];
    $description = $DATA["description"];
    

    include_once "../utils/addActivitiestoDB.php";

    echo json_encode(addActivities($name, $place, $sport, $description));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "POST"
    ]);
  }
  
?>