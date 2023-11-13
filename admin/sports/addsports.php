<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // include_once "../utils/userauth.php";
    /* include_once "../utils/auth/newsauth.php"; */

    if (empty($_POST["name"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "name";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }
//Si esta vacio manda el error
    if (empty($_POST["city"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "city";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

  
    $name = $_POST["name"]; 
    $city= $_POST["city"];

    include_once "../utils/sports/addSports.php";

    echo json_encode(addSports($name, $city));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "POST"
    ]);
  }
?>