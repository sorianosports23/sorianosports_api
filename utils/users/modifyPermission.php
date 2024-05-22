<?php
include_once "../database/connection.php";

function modifyPermission($permission, $username)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $stmt = $db->prepare("INSERT INTO permissions (username, permission) VALUES(:user, :permission)");
  $stmt->bindParam('user', $username);
  $stmt->bindParam('permission', $permission);

  if ($stmt->execute()) {
    $response["message"] = "Permisos editados correctamente";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = 'No se pudo añadir el permiso al usuario';
    return $response;
  }
}