<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // include_once "../utils/userauth.php";
   
    if (empty($DATA["name"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "name";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(empty($DATA["url"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "url";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(empty($DATA["description"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "description";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    $name = $DATA["name"]; 
    $to = $DATA["url"];
    $description = $DATA["description"];
      
    include_once "../utils/search/addSearch.php";

    echo json_encode(addSearch($name, $to, $description));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "POST"
    ]);
  }
?>