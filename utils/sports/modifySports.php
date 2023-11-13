<?php
  include_once "../database/connection.php";

  function modifySports($sportsID, $sports, $newSports) {
    global $db;    

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("UPDATE event SET $sports = ? WHERE id = ?");
    $stmt->bind_param('ii', $sportsID, $newSports);
    //stmt = "UPDATE city SET $city = ? WHERE id = ?;
    

    if ($stmt->execute()) {
      $response["message"] = "Deporte editado";
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

