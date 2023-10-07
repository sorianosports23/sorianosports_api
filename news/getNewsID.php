<?php
   header("Content-Type: application/json");
   header("Access-Control-Allow-Origin: *");

   if($_SERVER["REQUEST_METHOD"] === "GET") {
    if(!isset($_GET["newsid"])){
      echo json_encode([
        "status" => false,
        "message" => "Por favor ingrese ID"

      ]);
      die();    
    }

    $newsID = $_GET["newsid"];
    include_once  "../utils/news/getNewsID.php";

    echo json_encode(getNews($newsID));
  }
  else{
    echo json_encode([
      "message" => "Metodo equivocado para la petición",
      "correct_method" => "GET"
    ]);

  }
?>