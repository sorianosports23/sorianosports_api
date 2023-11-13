<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include_once "../utils/users/addUser.php";
    include_once "../utils/validationPass/validationPass.php";

    $DATA = json_decode(file_get_contents("php://input", true), true);
  
    if (empty($DATA["username"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "username";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if (empty($DATA["fullname"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "fullname";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if (empty($DATA["password"])) {
      $response["message"] = "No se envió uno de los valores";
      $response["input"] = "password";
      $response["status"] = false;
      echo json_encode($response);
      die();
  } else {
      $password = $DATA["password"];
      $passwordValidationResult = validationPass($password);

      if ($passwordValidationResult == 1) {
          $response["message"] = "La contraseña es demasiado corta.";
          $response["status"] = false;
          echo json_encode($response);
          die();
      } elseif ($passwordValidationResult == 2) {
          $response["message"] = "La contraseña es demasiado larga.";
          $response["status"] = false;
          echo json_encode($response);
          die();
      }
  }

    if (empty($DATA["email"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "email";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if (empty($DATA["age"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "age";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if (empty($DATA["ci"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "ci";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if (empty($DATA["phone"])) {
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "phone";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }
  
    $username = $DATA["username"];
    $fullname = $DATA["fullname"];
    $password = $DATA["password"];
    $email = $DATA["email"];
    $age = $DATA["age"];
    $ci = $DATA["ci"];
    $phone = $DATA["phone"];

    echo json_encode(addUser($username, $fullname, $password, $email, $age, $ci, $phone));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "POST"
    ]);
  }
?>