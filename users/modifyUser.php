<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Content-Type");

  include_once "../auth/admin.php";

  if ($_SERVER["REQUEST_METHOD"] === "PUT") {
    include_once "../utils/modifyuser.php";

    $DATA = json_decode(file_get_contents("php://input", true), true);
      
    if(empty($DATA["username"])){
      $response["message"] = "No ingresaste uno de los valores";
      $response["input"] = "username";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(empty($DATA["valueToEdit"])){
      $response["message"] = "No ingresaste uno de los valores";
      $response["input"] = "valueToEdit";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }
    
    if(empty($DATA["newValue"])){
      $response["message"] = "No ingresaste uno de los valores";
      $response["input"] = "newValue";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }
    $username = $DATA["username"];
    $valueToEdit = $DATA["valueToEdit"];
    $newValue = $DATA["newValue"];
  
    echo json_encode(modifyUser($username, $valueToEdit, $newValue));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "PUT"
    ]);
  }
?>