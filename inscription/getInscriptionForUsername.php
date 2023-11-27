<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  if($_SERVER["REQUEST_METHOD"] === "GET") {
    include_once "../utils/userauth.php";
    include_once  "../utils/inscription/getInscriptionForUsername.php";

    echo json_encode(getInscriptionForUsername($username));
 }
 else{
   echo json_encode([
     "message" => "Metodo equivocado para la petición",
     "correct_method" => "GET",
   ]);

 }
?>