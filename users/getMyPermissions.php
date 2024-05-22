<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER["REQUEST_METHOD"] === "GET") {
  include_once "../utils/userauth.php";
  include_once "../utils/users/getPermissions.php";

  $perms = getPermissionsFromUser($username);

  echo json_encode([
    "username" => $username,
    "permissions" => $perms
  ]);
} else {
  echo json_encode([
    "message" => "Metodo incorrecto para la peticion",
    "correct_method" => "GET"
  ]);
}