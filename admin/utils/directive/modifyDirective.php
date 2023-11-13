<?php
  include_once "../database/connection.php";

  function modifyDirective($attr, $newDirective, $directiveID) {
    global $db;    

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("UPDATE directive SET $attr = ? WHERE id = ?");

    if ($attr === "image") {
      $img = serialize(file_get_contents($newDirective["tmp_name"]));
      $stmt->bind_param("si", $img, $directiveID);
    } else {
      $stmt->bind_param("si", $newDirective, $directiveID);
    }

    if ($stmt->execute()) {
      $response["message"] = "Perfil editado correctamente";
      $response["status"] = true;

      $stmtType = $db->prepare("UPDATE directive SET imgType = ? WHERE id = ?");
      $stmtType->bind_param("si", $newDirective["type"], $directiveID);
      $stmtType->execute();

      $db->close();
      return $response;
    } else {
      $response["message"] = "Hubo un error al editar";
      $db->close();
      return $response;
    }
  }
?>