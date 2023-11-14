<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // include_once "../utils/userauth.php";
    /* include_once "../utils/auth/newsauth.php"; */

    $DATA = json_decode(file_get_contents("php://input", true), true);

    if (empty($DATA["nameCity"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "nameCity";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if (empty($DATA["nameSport"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "nameSport";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if (empty($DATA["typeSport"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "typeSport";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    //Esta condicional funciona cuando uno de los campos está vacio
    //La sentencia sirve para indicar que valor es el que no fue mandado o escrito
  
    $name = $DATA["nameCity"]; 
    $nameSport = $DATA["nameSport"];
    $typeSport = $DATA["typeSport"];
    
    include_once "../utils/cities/addCity.php";

    echo json_encode(addCityplace($name, $nameSport, $typeSport));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "POST"
    ]);
  }
?>