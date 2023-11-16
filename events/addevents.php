<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
 /*  include_once "../utils/auth/eventsauth.php"; */

  include_once "../utils/events/addEvent.php";

  $_POST = json_decode(file_get_contents("php://input", true), true);

  if(empty($_POST["name"])){
    $response["message"] = "No ingresaste uno de los valores";
    $response["input"] = "name";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if(empty($_FILES["image"])){
    $response["message"] = "No ingresaste uno de los valores";
    $response["input"] = "image";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if(empty($_POST["place"])){
    $response["message"] = "No ingresaste uno de los valores";
    $response["input"] = "place";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if(empty($_POST["time"])){
    $response["message"] = "No ingresaste uno de los valores";
    $response["input"] = "time";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  
  $name = $_POST["name"];
  $image = $_FILES["image"];
  $place = $_POST["place"];
  $time = $_POST["time"];
  $sport = $_POST["sport"];
  $description = $_POST["description"];
  $date_ev = $_POST["date_ev"];

  echo json_encode(addEvent($name, $image, $place, $time, $sport, $description, $date_ev));
}
?>
