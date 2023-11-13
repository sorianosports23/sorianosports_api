<?php
   header("Content-Type: application/json");
   header("Access-Control-Allow-Origin: *");

   if($_SERVER["REQUEST_METHOD"] === "GET") {

    include_once  "../utils/directive/getdirective.php";

    echo json_encode(getDirective());
  }
  else{
    echo json_encode([
      "message" => "Metodo equivocado para la petición",
      "correct_method" => "GET",
    ]);

  }
?>