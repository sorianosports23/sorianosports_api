<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
 /*  include_once "../utils/auth/eventsauth.php"; */

  include_once "../utils/events/addEvent.php";

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

  if(empty($_POST["city"])){
    $response["message"] = "No ingresaste uno de los valores";
    $response["input"] = "city";
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

  if(empty($_POST["sport"])){
    $response["message"] = "No ingresaste uno de los valores";
    $response["input"] = "sport";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if(empty($_POST["rules"])){
    $response["message"] = "No ingresaste uno de los valores";
    $response["input"] = "rules";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }

  if(empty($_POST["inscriptionInfo"])){
    $response["message"] = "No ingresaste uno de los valores";
    $response["input"] = "inscriptionInfo";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }


  if(empty($_POST["urlUbi"])){
    $response["message"] = "No ingresaste uno de los valores";
    $response["input"] = "urlUbi";
    $response["status"] = false;
    echo json_encode($response);
    die();
  }
  
  $name = $_POST["name"];
  $image = $_FILES["image"];
  $city = $_POST["city"];
  $place = $_POST["place"];
  $time = $_POST["time"];
  $sport = $_POST["sport"];
  $rules = $_POST["rules"];
  $inscriptionInfo = $_POST["inscriptionInfo"];
  $extraInfo = $_POST["extraInfo"] ?? null;
  $description = $_POST["description"];
  $date_ev = $_POST["date_ev"];
  $urlUbi = $_POST["urlUbi"];
  $check= $_POST["check_Great"] ?? 0;

  echo json_encode(addEvent($name, $image, $city, $place, $time, $sport, $rules, $inscriptionInfo, $extraInfo, $description, $date_ev, $urlUbi, $check));
}
else{
  echo json_encode([
    "message" => "Metodo equivocado para la peticion",
    "correct_method" => "POST"
  ]);
}
?>
