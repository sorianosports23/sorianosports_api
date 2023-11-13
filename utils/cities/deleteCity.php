<?php
  include_once "../database/connection.php";

  function deleteCityPlace($nameCity, $nameSport) {
    global $db;

    $response = [
      "menssage" => "",
      "status" => false
    ];

    $stmt = $db->prepare("DELETE FROM cityPlace WHERE nameCity = ? AND nameSport = ?");
    $stmt->bind_param('ss', $nameCity, $nameSport);

    if ($stmt->execute()) {
      $response["message"] = "Ciudad eliminada";
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