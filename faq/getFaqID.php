<?php
   header("Content-Type: application/json");
   header("Access-Control-Allow-Origin: *");

   if($_SERVER["REQUEST_METHOD"] === "GET") {
    
    if(empty(["faqID"])){
      $response["message"] = "No ingreso ID";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    $faqID = $_GET["faqID"];
    include_once  "../utils/faq/getFaqID.php";

    echo json_encode(getFaqID($faqID));
  }
  else{
    echo json_encode([
      "message" => "Metodo equivocado para la petición",
      "correct_method" => "GET",
    ]);

  }
?>