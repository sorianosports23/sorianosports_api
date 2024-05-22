<?php
include_once "../database/connection.php";

function deletePermission($username, $permission)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $stmt = $db->prepare("DELETE FROM permissions WHERE username = :user AND permission = :permission");
  $stmt->bindParam('user', $username);
  $stmt->bindParam('permission', $permission);

  if ($stmt->execute()) {
    $response["message"] = "Permiso eliminado correctamente";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo eliminar el permiso";
    return $response;
  }
}

function deletePermissionForUsers($username)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $stmt = $db->prepare("DELETE FROM permission WHERE username = :user");
  $stmt->bindParam('user', $username);

  if ($stmt->execute()) {
    $response["message"] = "Eliminado correctamente";
    $response["status"] = false;
    return $response;
  } else {
    $response["message"] = 'No se pudieron eliminar los permisos';
    return $response;
  }
}