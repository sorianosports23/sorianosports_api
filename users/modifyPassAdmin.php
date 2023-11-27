<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Content-Type, Authorization");
  header("Access-Control-Allow-Methods: POST");

  include_once "../auth/admin.php";

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
  
    include_once "../utils/userauth.php";
    include_once "../utils/users/modifyPassAdmin.php";

    $DATA = json_decode(file_get_contents("php://input", true), true);
      
   if(empty($DATA["newPassword"])){
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "newPassword";
    $response["status"] = false;
    echo json_encode($response);
    die();
   }

   if(empty($DATA["username"])){
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "username";
    $response["status"] = false;
    echo json_encode($response);
    die();
   }
    
    $newPassword = $DATA["newPassword"];
    $username = $DATA["username"];
  
    echo json_encode(modifyPassAdmin($newPassword, $username));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "POST"
    ]);
  }
?>