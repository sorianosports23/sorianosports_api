<?php
  include_once "../database/connection.php";

  function getKeyword($id) {
    global $db;

    $sql = "SELECT * FROM keywords WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    $data = $stmt->get_result();

    $keyword = [];

    while ($row = $data->fetch_assoc()) {
      array_push($keyword, $row["name"]);
    }
    
    $response["status"] = true;
    $response["data"] = $keyword;
    $db->close();
    return $response;
  }
?>