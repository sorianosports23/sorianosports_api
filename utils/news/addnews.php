<?php
 
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addNews($name, $img, $description, $note, $author, $date) {
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("INSERT INTO news (name, img, description, note, imgType, author, date) VALUES (?,?,?,?,?,?,?)");

    $serializedImage = serialize(file_get_contents($img["tmp_name"]));

    $stmt->bind_param("sssssss", $name, $serializedImage, $description, $note, $img["type"], $author, $date);

    if ($stmt->execute()) {
      $response["message"] = "Noticia añadida";
      $response["status"] = true;
      $db->close();
      return $response;
    } else {
      // $errMessage = getMessageError($db->errno);
      $response["message"] = $stmt->error;
      $db->close();
      return $response;
    }
  }

?>