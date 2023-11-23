<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  if ($_SERVER["REQUEST_METHOD"] === "GET") {
    include_once "../utils/userauth.php";
    include_once "../utils/contact/getAllMessagesFromUser.php";

    echo json_encode(getMessages($username));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "GET"
    ]);
  }
?>