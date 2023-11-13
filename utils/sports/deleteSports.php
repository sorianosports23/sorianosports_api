<?php
  include_once "../database/connection.php";

  function deleteSports($id) {
    global $db;

    $response = [
      "menssage" => "",
      "status" => false
    ];

    $stmt = $db->prepare("DELETE FROM sport WHERE id = ?");
    $stmt->bind_param('i', $id );

    if ($stmt->execute()) {
      $response["message"] = "Deporte eliminado Correctamente";
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