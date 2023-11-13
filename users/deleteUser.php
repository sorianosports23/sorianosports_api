<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if($_SERVER["REQUEST_METHOD"] === "POST"){

  include_once "../utils/users/deleteuser.php";
  include_once "../utils/users/deletePermissionForUser.php";

  $DATA = json_decode(file_get_contents("php://input", true), true);

  if (empty($DATA["username"])) {
    $response["message"] = "No has ingresado ningún usuario";
    $response["input"] = "username";
    $response["status"] = false;
    echo json_encode($response);
    die();
    return;
  }

  $username = $DATA["username"];

  $deletePermission = deletePermissionForUser($username);

  if(!$deletePermission["status"]){
    $response["message"] = "Hubo un error al eliminar";
    $response["status"] = false;
    die();
  }

  echo json_encode(deleteUser($username));

} else{
  echo json_encode([
    "message" => "Metedo equivocado para la petición",
    "correct_method" => "POST"
  ]);
}
?>