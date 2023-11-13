<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Headers: Content-Type");
  header("Access-Control-Allow-Origin: *");

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include_once "../utils/verifyUser.php";

    $DATA = json_decode(file_get_contents("php://input", true), true);
  
  
    if (empty($DATA["username"]) || empty($DATA["password"])) {
      $result["message"] = "Debes ingresar un usuario y contraseña!";
      echo json_encode($result);
      $db->close();
      return;
    }
  
    $username = $DATA["username"];
    $password = $DATA["password"];
  
    echo json_encode(verifyUser($username, $password));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "POST"
    ]);
  }
?>
