<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");

  if($_SERVER["REQUEST_METHOD"] === "GET") {
   if(!isset($_GET["usernameInscrip"])){
     echo json_encode([
       "status" => false,
       "message" => "Por favor ingrese nombre de usuario",
     ]);
     die();
   }

   $usernameInscrip = $_GET["usernameInscrip"];
   include_once  "../utils/inscription/getInscriptionForUsername.php";

   echo json_encode(getInscriptionForUsername($usernameInscrip));
 }
 else{
   echo json_encode([
     "message" => "Metodo equivocado para la petición",
     "correct_method" => "GET",
   ]);

 }
?>