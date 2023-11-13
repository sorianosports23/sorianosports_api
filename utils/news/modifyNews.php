<?php
  include_once "../database/connection.php";

  function modifyNews($newsID, $attr, $newNews) {
    global $db;    

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("UPDATE news SET $attr = ? WHERE id = ?");

    if ($attr === "img") {
      $img = serialize(file_get_contents($newNews["tmp_name"]));
      $stmt->bind_param("si", $img, $newsID);
    } else {
      $stmt->bind_param("si", $newNews, $newsID);
    }

    if ($stmt->execute()) {
      $response["message"] = "Evento editado correctamente";
      $response["status"] = true;
      if ($attr === "img") {
        $stmt2 = $db->prepare("UPDATE news SET imgType = ? WHERE id = ?");
        $stmt2->bind_param("si", $newNews["type"], $newsID);
        $stmt2->execute();
      }
      $db->close();
      return $response;
    } else {
      $response["message"] = "Hubo un error al editar";
      $db->close();
      return $response;
    }
  }
?>