<?php
   header("Content-Type: application/json");
   header("Access-Control-Allow-Origin: *");

   if($_SERVER["REQUEST_METHOD"] === "GET") {
    if(!empty($_GET["keywordID"])){
      echo json_encode([
        "status" => false,
        "message" => "Por favor ingrese ID",
      ]);
      die();
    }

    $keywordID = $_GET["keywordID"];
    include_once  "../utils/search/getKeywordID.php";

    echo json_encode(getKeyword($keywordID));
  }
  else{
    echo json_encode([
      "message" => "Metodo equivocado para la petición",
      "correct_method" => "GET",
    ]);

  }
?>