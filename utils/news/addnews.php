<?php
 
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addNews($name, $img, $description, $note){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];


    $query = "INSERT INTO news (name, img, description, note) VALUES ('$name', '$img', '$description', '$note')";

    if ($db->query($query)) {
      $response["message"] = "Noticia añadida";
      $response["status"] = true;
      $db->close();
      return $response;
    } else {
      $errMessage = getMessageError($db->errno);
      $response["message"] = $errMessage;
      $db->close();
      return $response;
    }
  }

?>