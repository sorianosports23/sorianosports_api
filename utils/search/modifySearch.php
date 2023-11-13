<?php
  include_once "../database/connection.php";

  function modifySearch($searchID, $search, $newSearch) {
    global $db;    

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("UPDATE search SET $search = ? WHERE id = ?");
    $stmt->bind_param('si', $newSearch, $searchID);
    //stmt = "UPDATE city SET $city = ? WHERE id = ?;
    

    if ($stmt->execute()) {
      $response["message"] = "Busqueda editada";
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
