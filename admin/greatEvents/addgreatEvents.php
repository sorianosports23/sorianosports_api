<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // include_once "../utils/userauth.php";
    /* include_once "../utils/auth/newsauth.php"; */

    if (!isset($_FILES["image"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "img";
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

    if (!isset($_POST["description"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "description";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if (!isset($_POST["placelink"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "placelink";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if (!isset($_POST["date"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "date";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    $image = $_FILES["image"];
    $name = $_POST["name"];
    $description = $_POST["description"];
    $placelink = $_POST["placelink"];
    $date = $_POST["date"];

    include_once "../utils/greatEvents/addGreatEvents.php";

    echo json_encode(addGreatEvents($image, $name, $description, $placelink, $date));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "POST"
    ]);
  }
?>