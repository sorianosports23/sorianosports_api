<?php
  include_once "../database/connection.php";

  function deleteEvents($id) {
    global $db;

    $response = [
      "menssage" => "",
      "status" => false
    ];

    $stmt = $db->prepare("DELETE FROM event WHERE id = ?");
    $stmt->bind_param('i', $id );

    $res = $stmt->execute();

    if ($stmt->execute()) {
      $response["message"] = "Evento eliminado Correctamente";
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