<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: Content-Type, Authorization");
  header("Access-Control-Allow-Methods: DELETE");

if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
  include_once "../utils/userauth.php";
  include_once "../utils/deleteuser.php";
  include_once "../utils/verifyUser.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  $response = [
    "message" => "",
    "status" => false
  ];

  if (empty($DATA["password"])) {
    $response["message"] = "No ingresaste la contraseña";
    $response["err"] = "password";
    echo json_encode($response);
    die();
  }

  $password = $DATA["password"];

  $correctPassword = verifyUser($username, $password);

  if (!$correctPassword["status"]) {
    $response["message"] = $correctPassword["message"];
    $response["err"] = "password";
    echo json_encode($response);
    die();
  }
  
  echo json_encode(deleteUser($username));
} else {
  echo json_encode([
    "message" => "Metodo equivocado para la peticion",
    "correct_method" => "DELETE"
  ]);
}
?>