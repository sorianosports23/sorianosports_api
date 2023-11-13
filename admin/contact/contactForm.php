<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include_once "../utils/contact/addContactToDb.php";

    $DATA = json_decode(file_get_contents("php://input", true), true);
  
    if(empty($DATA["name"])){
      $return["message"] = "No ingresaste uno de los valores";
      $return["err"] = "name";
      echo json_encode($return);
      die();
    }
    
    if(empty($DATA["email"])){
      $return["message"] = "No ingresaste uno de los valores";
      $return["err"] = "email";
      echo json_encode($return);
      die();
    }

    if(empty($DATA["subject"])){
      $return["message"] = "No ingresaste uno de los valores";
      $return["err"] = "subject";
      echo json_encode($return);
      die();
    }

    if(empty($DATA["messageContact"])){
      $return["message"] = "No ingresaste uno de los valores";
      $return["err"] = "messageContact";
      echo json_encode($return);
      die();
    }

    $name = $DATA["name"];
    $email = $DATA["email"];
    $subject = $DATA["subject"];
    $messageContact = $DATA["messageContact"];

    echo json_encode(addContact($name, $email, $subject, $messageContact));
  }
?>