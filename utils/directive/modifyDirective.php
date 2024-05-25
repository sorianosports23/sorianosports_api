<?php
include_once "../database/connection.php";

function modifyDirective($attr, $newDirective, $directiveID)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $stmt = $db->prepare("UPDATE directive SET $attr = :attr WHERE id = :id");
  $stmt->bindParam('id', $directiveID);

  if ($attr === "image") {
    $img = file_get_contents($newDirective["tmp_name"]);
    $stmt->bindParam('attr', $img);
    $updateImg = $db->prepare("UPDATE directive SET imgType = {$newDirective['type']} WHERE id = {$directiveID}");
  } else {
    $stmt->bindParam('attr', $newDirective);
  }

  if ($stmt->execute() > 0) {
    $response["message"] = "Editado correctamente";
    $response["status"] = true;

    if ($attr === 'image') {
      $updateImg->execute();
    }

    return $response;
  } else {
    $response["message"] = "No se pudo editar";
    return $response;
  }
}