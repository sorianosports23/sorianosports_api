<?php
  include_once "../database/connection.php";

  function modifySummerSport($summerSportID, $summerSports, $newSummerSports) {
    global $db;    

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("UPDATE summerSport SET $summerSports = ? WHERE id = ?");
    $stmt->bind_param('ii', $summerSportsID, $newSummerSports);
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
