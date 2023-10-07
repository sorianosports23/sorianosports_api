<?php
  include_once "../database/connection.php";
  include_once "verifyPass.php";

  function modifyPass($password, $newPassword, $username){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $actualPassword = getPassFromDB($username);

    if (!password_verify($password, $actualPassword["password"])) {
      $response["message"] = "La contraseña actual es incorecta";
      $response["err"] = "actualpassword";
      $db->close();
      return $response;
    }

    $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $query = "UPDATE users SET password = '$hashedNewPassword' WHERE username = '$username'";

    if ($db->query($query)) {
      $response["message"] = "Contraseña editada correctamente";
      $response["status"] = true;
      $db->close();
      return $response;
    } 
    else {
      $response["message"] = "Hubo un error al editar la contraseña";
      $db->close();
      return $response;
    }
  }
  
  function verifyNewPass($password, $newPassword){
    if($password !== $newPassword ){
      $response = [
        "status" => false,
        "message" => "Las contraseñas no coinciden",
        "err" => "newpass"
      ];
      echo json_encode($response);
      die();
    }

  }
?>