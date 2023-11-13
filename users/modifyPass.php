<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Content-Type, Authorization");
  header("Access-Control-Allow-Methods: PUT");

  if ($_SERVER["REQUEST_METHOD"] === "PUT") {
  
    include_once "../utils/userauth.php";
    include_once "../utils/modifyPass.php";

    $DATA = json_decode(file_get_contents("php://input", true), true);
      
   if(empty($DATA["password"])){
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "password";
    $response["status"] = false;
    echo json_encode($response);
    die();
   }

   if(empty($DATA["newPassword"])){
    $response["message"] = "No se envio uno de los valores";
    $response["input"] = "newPassword";
    $response["status"] = false;
    echo json_encode($response);
    die();
   }
    
    $password = $DATA["password"];
    $newPassword = $DATA["newPassword"];
  
    echo json_encode(modifyPass($password, $newPassword, $username));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "PUT"
    ]);
  }
?>