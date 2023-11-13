<?php
  include_once "../database/connection.php";

  function modifySocialMedia($socialMedia, $newLink) {
    global $db;    

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("UPDATE socialMedia SET link = ? WHERE name = ?");
    $stmt->bind_param('ss', $newLink, $socialMedia);
    //stmt = "UPDATE city SET $city = ? WHERE id = ?;
    

    if ($stmt->execute()) {
      $response["message"] = "Lugar editado";
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