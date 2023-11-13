<?php
  include_once "../database/connection.php";

  function modifySearch($keywordID, $keyword, $newKeyword) {
    global $db;    

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("UPDATE keywords SET $keyword = ? WHERE id = ?");
    $stmt->bind_param('si', $newKeyword,   $keywordID);
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


