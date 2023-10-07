<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Content-Type");

  if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
    include_once "../utils/auth/editusersauth.php";
    include_once "../utils/modifyuser.php";

    $DATA = json_decode(file_get_contents("php://input", true), true);
      
    //seguir...
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "DELETE"
    ]);
  }
?>