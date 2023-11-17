<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  if($_SERVER["REQUEST_METHOD"] === "GET") {

   if(empty($_GET["username"])){
     echo json_encode([
       "status" => false,
       "message" => "Por favor ingrese nombre de usuario",
     ]);
     die();
   }

   $usernameInscrip = $_GET["username"];
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