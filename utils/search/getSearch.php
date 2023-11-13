<?php
  include_once "../database/connection.php";
  // include_once "getKeywordsID.php";

  function getSearch() {
    global $db;

    $sql = "SELECT * FROM search";
    $result = $db->query($sql);

    $response = ["status"=>false];

    $search = [];

    while ($row = $result->fetch_assoc()) {
      $id = $row["id"];
      $res = $db->query("SELECT * FROM keywords WHERE id = $id");

      $keywords = [];

      while ($row_kw = $res->fetch_assoc()) {
        array_push($keywords, $row_kw["name"]);
      }
      $row["keywords"] = $keywords;
      array_push($search, $row);
    }
    
    $response["status"] = true;
    $response["data"] = $search;
    $db->close();
    return $response;
  }
?>