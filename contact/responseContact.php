<?php
  header('Content-Type: application/json');

  if($_SERVER["REQUEST_METHOD"] === "POST"){
    include_once "../utils/contact/responseContact.php";

    $DATA = json_decode(file_get_contents("php://input", true), true);

    if(empty($DATA["name"])){
      $response["message"] = "No ingresaste uno de los valores";
      $response["input"] = "name";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }
    if(empty($DATA["email"])){
      $response["message"] = "No ingresaste uno de los valores";
      $response["input"] = "email";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(empty($DATA["message"])){
      $response["message"] = "No ingresaste uno de los valores";
      $response["input"] = "message";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    $name = $DATA["name"];
    $email = $DATA["email"];
    $message = $DATA["message"];

    echo json_encode(responseContact($name, $email, $subject, $message));
  }
?>