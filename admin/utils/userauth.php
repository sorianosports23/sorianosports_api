<?php
  include_once "verifyUser.php";
  include_once "getuser.php";
  
  $response = [
    "authorization" => false
  ];

  $username = "";

  $headers = apache_request_headers();

  if (!isset($headers["Authorization"])) {
    $response["message"] = "No proporcionaste el token";
    echo json_encode($response);
    die();
  }

  $SPToken = $headers["Authorization"];
  $token = "";

  if (strpos($SPToken, "SPToken") === 0) {
    $token = substr($SPToken, strlen("SPToken "));
  } else {
    $response["message"] = "El token proporcionado no es valido";
    echo json_encode($response);
    die();
  }

  $loginData = verifyUserWithToken($token);
  if (!isset($loginData["username"])) {
    $response["message"] = "El token proporcionado no es valido";
    $response["asd"] = $SPToken;
    $response["asdasd"] = $loginData;
    echo json_encode($response);
    die();
  }
  $userPasswordHashed = getUserPassword($loginData["username"]);

  if ($userPasswordHashed === null) {
    $response["message"] = "Usuario no existe";
    echo json_encode($response);    
    die();
  }

  if (!password_verify($loginData["password"], $userPasswordHashed)) {
    $response["message"] = "Contraseña incorrecta";
    $response["err"] = "password";
    echo json_encode($response);
    die();
  } else {
    $response["authorization"] = true;
    $username = $loginData["username"];
  }
?>