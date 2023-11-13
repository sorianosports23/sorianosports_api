<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // include_once "../utils/userauth.php";
    /* include_once "../utils/auth/newsauth.php"; */

    if (!isset($_POST["title"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "title";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if (!isset($_FILES["image"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "img";
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

    if (!isset($_POST["content"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "note";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if (!isset($_POST["author"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "author";
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

    $name = $_POST["title"];
    $img = $_FILES["image"];
    $description = $_POST["description"];
    $note = $_POST["content"];
    $author = $_POST["author"];
    $date = $_POST["date"];

    include_once "../utils/news/addNews.php";

    echo json_encode(addNews($name, $img, $description, $note, $author, $date));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "POST"
    ]);
  }
?>