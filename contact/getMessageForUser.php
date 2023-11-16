<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");

  if($_SERVER["REQUEST_METHOD"] === "GET") {
   if(!isset($_GET["usernameMessage"])){
     echo json_encode([
       "status" => false,
       "message" => "Por favor ingrese nombre de usuario",
     ]);
     die();
   }

   $usernameMessage = $_GET["usernameMessage"];
   include_once  "../utils/contact/getMessageForUser.php";

   echo json_encode(getMessageForUser($usernameMessage));
 }
 else{
   echo json_encode([
     "message" => "Metodo equivocado para la petición",
     "correct_method" => "GET",
   ]);

 }
?>