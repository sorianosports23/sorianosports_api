<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Headers: Content-Type, Authorization");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: PUT");

  if ($_SERVER["REQUEST_METHOD"] === "PUT") {
    include_once "../utils/userauth.php";
    include_once "../utils/modifyuser.php";

    $DATA = json_decode(file_get_contents("php://input", true), true);

    $result = [
      "message" => "",
      "status" => false
    ];

    if (empty($DATA["fullname"])) {
      $result["message"] = "No ingresaste uno de los valores";
      $result["err"] = "fullname";
      echo json_encode($result);
      die();
    }

    if (empty($DATA["email"])) {
      $result["message"] = "No ingresaste uno de los valores";
      $result["err"] = "phone";
      echo json_encode($result);
      die();
    }

    if (empty($DATA["email"])) {
      $result["message"] = "No ingresaste uno de los valores";
      $result["err"] = "email";
      echo json_encode($result);
      die();
    }

    $newFullname = $DATA["fullname"];
    $newEmail = $DATA["email"];
    $newPhone = $DATA["phone"];

    $newFullnameChanged = modifyUser($username, "fullname", $newFullname);
    $newEmailChanged = modifyUser($username, "email", $newEmail);
    $newPhoneChanged = modifyUser($username, "phone", $newPhone);

    if (!$newFullnameChanged["status"]) {
      $result["message"] = "Ocurrio un error al actualizar los datos";
      $result["err"] = "fullname";
      echo json_encode($result);
      die();
    }

    if (!$newEmailChanged["status"]) {
      $result["message"] = "Ocurrio un error al actualizar los datos";
      $result["err"] = "email";
      echo json_encode($result);
      die();
    }

    if (!$newPhoneChanged["status"]) {
      $result["message"] = "Ocurrio un error al actualizar los datos";
      $result["err"] = "phone";
      echo json_encode($result);
      die();
    }
    
    $result["status"] = true;
    $result["message"] = "Datos actualizados correctamente";
    echo json_encode($result);
  } else {
    $response = [
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "PUT"
    ];
    echo json_encode($response);
  }
?>