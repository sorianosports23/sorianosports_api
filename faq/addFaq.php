<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  // include_once "../auth/admin.php";

  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // include_once "../utils/userauth.php";
    /* include_once "../utils/auth/newsauth.php"; */

    $DATA = json_decode(file_get_contents("php://input", true), true);


    if (empty($DATA["name"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "name";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if (empty($DATA["response"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "response";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    //Esta condicional funciona cuando uno de los campos está vacio
    //La sentencia sirve para indicar que valor es el que no fue mandado o escrito
  
    $name = $DATA["name"]; 
    $response = $DATA["response"];

    include_once "../utils/faq/addFaq.php";

    echo json_encode(addFaq($name, $response));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "POST"
    ]);
  }
?>