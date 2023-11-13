<?php
  include_once "../database/connection.php";

  function deleteKeyword($id, $name) {
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("DELETE FROM keywords WHERE id = ? AND name = ?");
    $stmt->bind_param('is', $id, $name);

    $res = $stmt->execute();

    if ($stmt->execute()) {
      $response["message"] = "Keyword eliminada correctamente";
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

    function deleteKeywordForID($id){
      global $db;

      $response = [
        "message" => "",
        "status" => false
      ];

      $stmt = $db->prepare("DELETE FROM keywords WHERE id = ?");
      $stmt->bind_param('i', $id);

      $res = $stmt->execute();

      if ($stmt->execute()) {
        $response["message"] = "Eliminado correctamente";
        $response["status"] = true;
        return $response;
      } else {
        // $errMessage = getMessageError($db->errno);
        $response["message"] = $stmt->error;
        $db->close();
        return $response;
      }

      
    }
  
  
?>