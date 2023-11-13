<?php
   header("Content-Type: application/json");
   header("Access-Control-Allow-Origin: *");

   if($_SERVER["REQUEST_METHOD"] === "GET") {
    if(empty($_GET["searchID"])){
      echo json_encode([
        "status" => false,
        "message" => "Por favor ingrese ID",
      ]);
      die();
    }

    $searchID = $_GET["searchID"];
    include_once  "../utils/search/getSearchID.php";

    echo json_encode(getSearch($searchID));
  }
  else{
    echo json_encode([
      "message" => "Metodo equivocado para la petición",
      "correct_method" => "GET",
    ]);

  }
?>