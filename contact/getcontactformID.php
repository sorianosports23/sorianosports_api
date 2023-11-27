<?php
   header("Content-Type: application/json");
   header("Access-Control-Allow-Origin: *");

  include_once "../auth/admin.php";

   if($_SERVER["REQUEST_METHOD"] === "GET") {
    if(!isset($_GET["contactID"])){
      echo json_encode([
        "status" => false,
        "message" => "Por favor ingrese ID",
      ]);
      die();
    }

    $contactID = $_GET["contactID"];
    include_once  "../utils/contact/getcontactformID.php";

    echo json_encode(getContact($contactID));
  }
  else{
    echo json_encode([
      "message" => "Metodo equivocado para la petición",
      "correct_method" => "GET",
    ]);

  }
?>