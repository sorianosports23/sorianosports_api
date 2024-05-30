<?php
include_once "../database/connection.php";

function getImage($id)
{
  global $db;

  $query = "SELECT ciimage, ciimgtype FROM inscriptionform WHERE id = :id";
  $stmt = $db->prepare($query);
  $stmt->bindParam('id', $id);
  $stmt->execute();
  $res = $stmt->fetch(PDO::FETCH_ASSOC);

  $response = [
    "status" => false
  ];

  if ($res) {
    $response["status"] = true;

    if (is_null($res["ciimage"])) {
      $response["status"] = false;
      return $response;
    }

    $response["image"] = $res["ciimage"];
    $response["type"] = $res["ciimgtype"];

    return $response;
  } else {
    return $response;
  }
}