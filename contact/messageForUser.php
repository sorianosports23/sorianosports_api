<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  include_once "../auth/admin.php";

  if($_SERVER["REQUEST_METHOD"] === "POST"){
    include_once "../utils/contact/messageForUser.php";

    $DATA = json_decode(file_get_contents("php://input", true), true);

    if(empty($DATA["id"])){
      $response["message"] = "No ingreso uno de los valores";
      $response["input"] = "id";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(empty($DATA["message"])){
      $response["message"] = "No ingreso uno de los valores";
      $response["input"] = "message";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    $id = $DATA["id"];
    $message = $DATA["message"];

    echo json_encode(messageForUser($id, $message));
  }else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "POST"
    ]);
  }
?>