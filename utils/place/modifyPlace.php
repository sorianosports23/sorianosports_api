<?php
  include_once "../database/connection.php";

  function modifyPlace($placeID, $place, $newPlace) {
    global $db;    

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("UPDATE event SET $place = ? WHERE id = ?");
    $stmt->bind_param('ii', $placeID, $newPlace);
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

