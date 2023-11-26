<?php
 
  include_once "../database/connection.php";
  include_once "../utils/errorcodes.php";

  function addGreatEvents($image, $name, $description, $placelink, $date) {
    global $db;

    $response = [
      "message" => "",
      "status" => false
    ];

    $stmt = $db->prepare("INSERT INTO greatEvents (image, imgType, name, description, placelink, date) VALUES (?,?,?,?,?,?)");

    $serializedImage = serialize(file_get_contents($image["tmp_name"]));

    $stmt->bind_param("ssssssi", $serializedImage, $image["type"], $name, $description, $placelink, $date );

    if ($stmt->execute()) {
      $response["message"] = "Gran Evento Añadido Correctamente";
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