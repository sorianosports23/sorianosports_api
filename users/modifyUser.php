<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Content-Type");

  if ($_SERVER["REQUEST_METHOD"] === "PUT") {
    include_once "../utils/auth/editusersauth.php";
    include_once "../utils/modifyuser.php";

    $DATA = json_decode(file_get_contents("php://input", true), true);
      
    if (empty($DATA["username"]) || empty($DATA["valueToEdit"]) || empty($DATA["newValue"])) {
      $response["message"] = "No ingresate uno de los valores";
      $response["status"] = false;
      echo json_encode($response);
      $DB->close();
      return;
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