<?php
  include_once "../database/connection.php";

  function getImage($id) {
    global $db;

    $query = "SELECT image, imgType FROM greatEvents WHERE id = $id";
    $res = $db->query($query);

    if ($res->num_rows > 0) {
      $imageInfo = [];

      $imageDB = $res->fetch_assoc();

      $imageInfo["image"] = $imageDB["image"];
      $imageInfo["imgType"] = $imageDB["imgType"];

      return $imageInfo;
    } else {
      return [
        "message" => "No se encontro la imagen",
        "status" => false
      ];
    }
  }
?>