<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Headers: Authorization");
header("Access-Control-Allow-Origin: *");

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  include_once "../utils/userauth.php"; // de aca sale el $response[];
  include_once "../utils/getUserFromDB.php";

  $userData = getUserFromDB($username);

  $response["data"] = $userData;

  echo json_encode($response);
} else {
  echo json_encode([
    "message" => "Metodo equivocado para la peticion",
    "correct_method" => "GET"
  ]);
}