<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // include_once "../utils/userauth.php";
    /* include_once "../utils/auth/newsauth.php"; */

    if (!isset($_FILES["image"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "image";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if (!isset($_POST["name"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "name";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if (!isset($_POST["rank"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "rank";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    $image = $_FILES["image"];
    $name = $_POST["name"]; 
    $rank = $_POST["rank"];

    include_once "../utils/directive/addDirective.php";

    echo json_encode(addDirective($image, $name, $rank));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "POST"
    ]);
  }
?>