<?php
  include_once "../database/connection.php";
  include_once "getuser.php";
  include_once "encryptData.php";

  function verifyUser($username, $password) {
    global $db;

    $response = [
      "message" => "",
      "status" => false,
      "input" => ""
    ];

    $userPasswordHashed = getUserPassword($username);

    if ($userPasswordHashed === null) {
      $response["message"] = "No existe ese usuario";
      $response["input"] = "username";
      return $response;
    }

    if (password_verify($password, $userPasswordHashed)) {
      $response["message"] = "Contraseña correcta";
      $response["status"] = true;
      $loginData = [
        "username" => $username,
        "password" => $password
      ];
      $loginDataHash = encryptData($loginData);
      $response["token_prefix"] = "SPToken";
      $response["token"] = $loginDataHash;
      return $response;
    } else {
      $response["message"] = "Contraseña incorrecta";
      $response["input"] = "password";
      return $response;
    }
  }

  function verifyUserWithToken($token) {
    global $db;

    $data = decryptData($token);
    return $data;
  }
?>