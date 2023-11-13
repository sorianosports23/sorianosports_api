<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // include_once "../utils/userauth.php";
    /* include_once "../utils/auth/newsauth.php"; */

    if (empty($DATA["name"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "name";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(empty($DATA["link"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "link";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }
  
    $name = $DATA["name"]; 
    $link = $DATA["link"];
   
    include_once "../utils/socialMedia/addSocialMedia.php";

    echo json_encode(addSocialMedia($name, $link));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "POST"
    ]);
  }
?>