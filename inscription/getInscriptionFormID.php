<?php
   header("Content-Type: application/json");
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Headers: *");

   if($_SERVER["REQUEST_METHOD"] === "GET") {
    if(empty($_GET["inscriptionID"])){
      echo json_encode([
        "status" => false,
        "message" => "Por favor ingrese ID",
      ]);
      die();
    }

    $inscriptionID = $_GET["inscriptionID"];
    include_once  "../utils/inscription/getInscriptionID.php";

    echo json_encode(getInscription($inscriptionID));
  }
  else{
    echo json_encode([
      "message" => "Metodo equivocado para la petición",
      "correct_method" => "GET",
    ]);

  }
?>