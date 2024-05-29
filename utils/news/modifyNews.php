<?php
include_once "../database/connection.php";

function modifyNews($newsID, $attr, $newNews)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $stmt = $db->prepare("UPDATE news SET $attr = :newattr WHERE id = :id");
  $stmt->bindParam('id', $newsID);

  if ($attr === "img") {
    $img = file_get_contents($newNews["tmp_name"]);
    $stmt->bindParam("newattr", $img, PDO::PARAM_LOB);
  } else {
    $stmt->bindParam("newattr", $newNews);
  }

  if ($stmt->execute() > 0) {
    $response["message"] = "Noticia editada correctamente";
    $response["status"] = true;
    if ($attr === "img") {
      $stmt2 = $db->prepare("UPDATE news SET imgtype = :imgtype WHERE id = :id");
      $stmt2->bindParam("id", $newsID);
      $stmt2->bindParam("imgtype", $newNews["type"]);
      $stmt2->execute();
    }
    return $response;
  } else {
    $response["message"] = "No se pudo editar la noticia";
    return $response;
  }
}