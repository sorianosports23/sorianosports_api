<?php
  include_once "../database/connection.php";

  function getImage($id) {
    global $db;

    $query = "SELECT medicalRecordImg, medicalRecordImgType FROM inscriptionform WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $id);
    $res = $stmt->execute();

    $response = [
      "status" => false
    ];

    if ($res) {
      $response["status"] = true;

      $result = $stmt->get_result();
      $image = $result->fetch_assoc();

      if (is_null($image["medicalRecordImg"])) {
        $response["status"] = false;
        $db->close();
        return $response;
        die();
      }

      $response["image"] = $image["medicalRecordImg"];
      $response["type"] = $image["medicalRecordImgType"];
      
      $db->close();
      return $response;
    } else {
      $db->close();
      return $response;
    }
  }
?>