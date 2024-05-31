<?php
include_once "../database/connection.php";

function getImage($id)
{
  global $db;

  $query = "SELECT medicalrecordimg, medicalrecordimgtype FROM inscriptionform WHERE id = :id";
  $stmt = $db->prepare($query);
  $stmt->bindParam('id', $id);
  $stmt->execute();
  $res = $stmt->fetch(PDO::FETCH_ASSOC);

  $response = [
    "status" => false
  ];

  if ($res) {
    $response["status"] = true;

    if (is_null($res["medicalrecordimg"])) {
      $response["status"] = false;
      return $response;
    }

    $response["image"] = $res["medicalrecordimg"];
    $response["type"] = $res["medicalrecordimgtype"];

    return $response;
  } else {
    return $response;
  }
}