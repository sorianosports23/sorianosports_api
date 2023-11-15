<?php
  include_once "../database/connection.php";

  function editStatus($id, $st, $newStatus){
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("UPDATE contact SET status = ? WHERE id = ?");
    $stmt->bind_param('ii', $newStatus, $id);

    
    if ($stmt->execute()) {
      $response["message"] = "Estado editado";
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

