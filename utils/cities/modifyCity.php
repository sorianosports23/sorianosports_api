<?php
  include_once "../database/connection.php";

  function modifyCityPlace($cityPlaceID, $cityPlace, $newCityPlace) {
    global $db;    

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("UPDATE city SET $city = ? WHERE id = ?");
    $stmt->bind_param('ii', $cityID, $newCity);
    //stmt = "UPDATE city SET $city = ? WHERE id = ?;
    

    if ($stmt->execute()) {
      $response["message"] = "Ciudad editada";
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