<?php
  include_once "../database/connection.php";

  function deletePlace($id) {
    global $db;

    $response = [
      "menssage" => "",
      "status" => false
    ];

    $stmt = $db->prepare("DELETE FROM place WHERE id = ?");
    $stmt->bind_param('i', $id );

    $res = $stmt->execute();

    if ($stmt->execute()) {
      $response["message"] = "Lugar eliminado correctamente";
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