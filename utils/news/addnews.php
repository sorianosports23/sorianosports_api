<?php

include_once "../database/connection.php";
include_once "../utils/errorcodes.php";

function addNews($name, $img, $description, $note, $author, $date)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $stmt = $db->prepare(
    "
      INSERT INTO news (name, img, description, note, imgtype, author, date) 
      VALUES (:name,:img,:description,:note,:imgtype,:author,:date)
    "
  );

  $serializedImage = file_get_contents($img["tmp_name"]);

  $stmt->bindParam('name', $name);
  $stmt->bindParam('img', $serializedImage, PDO::PARAM_LOB);
  $stmt->bindParam('description', $description);
  $stmt->bindParam('note', $note);
  $stmt->bindParam('imgtype', $img['type']);
  $stmt->bindParam('author', $author);
  $stmt->bindParam('date', $date);

  if ($stmt->execute() > 0) {
    $response["message"] = "Noticia añadida";
    $response["status"] = true;
    return $response;
  } else {
    $response["message"] = "No se pudo añadir la noticia";
    return $response;
  }
}