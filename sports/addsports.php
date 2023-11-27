<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  include_once "../auth/admin.php";

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
//Si esta vacio manda el error
    if (empty($DATA["city"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "city";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(empty($DATA["typeSport"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "typeSport";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }
  
    $name = $DATA["name"]; 
    $city = $DATA["city"];
    $typeSport = $DATA["typeSport"];

    include_once "../utils/sports/addSports.php";

    echo json_encode(addSports($name, $city, $typeSport));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "POST"
    ]);
  }
?>