<?php
 
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addDirective($image, $name, $rank) {
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("INSERT INTO directive (image, name, rank, imgType) VALUES (?,?,?,?)");

    $serializedImage = serialize(file_get_contents($image["tmp_name"]));

    $stmt->bind_param("ssss", $serializedImage, $name, $rank, $image["type"]);

    if ($stmt->execute()) {
      $response["message"] = "Añadido Correctamente";
      $response["status"] = true;
      $db->close();
      return $response;
    } else {
      $errMessage = getMessageError($db->errno);
      $response["message"] = $errMessage;
      $db->close();
      return $response;
    }
  }

?>