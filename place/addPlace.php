<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // include_once "../utils/userauth.php";
    /* include_once "../utils/auth/newsauth.php"; */

    if (empty($DATA["sport"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "sport";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(empty($DATA["age"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "age";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(empty($DATA["city"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "city";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(empty($DATA["place"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "place";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(empty($DATA["teacher"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "teacher";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(empty($DATA["date"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "date";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(empty($DATA["time"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "time";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

  
    $sport = $DATA["sport"]; 
    $age = $DATA["age"];
    $city = $DATA["city"];
    $place = $DATA["place"];
    $teacher = $DATA["teacher"];
    $date = $DATA["date"];
    $time = $DATA["time"];

    include_once "../utils/place/addPlace.php";

    echo json_encode(addPlace($sport, $age, $city, $place, $teacher, $date, $time));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "POST"
    ]);
  }
?>