<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  if($_SERVER["REQUEST_METHOD"] === "GET") {
   if(!isset($_GET["idMessage"])){
     echo json_encode([
       "status" => false,
       "message" => "Por favor ingrese id",
     ]);
     die();
   }

   $idMessage = $_GET["idMessage"];
   include_once  "../utils/contact/getMessageForUser.php";

   echo json_encode(getMessageForUser($idMessage));
 }
 else{
   echo json_encode([
     "message" => "Metodo equivocado para la petición",
     "correct_method" => "GET",
   ]);

 }
?>