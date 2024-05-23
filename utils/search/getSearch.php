<?php
include_once "../database/connection.php";
// include_once "getKeywordsID.php";

function getSearch()
{
  global $db;

  $sql = "SELECT * FROM search";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $response = ["status" => false];

  $search = [];

  foreach ($result as $row) {
    $id = $row["id"];
    $res_sql = "SELECT * FROM keywords WHERE id = $id";
    $stmt_res = $db->prepare($res_sql);
    $stmt_res->execute();
    $res = $stmt_res->fetchAll();

    $keywords = [];

    foreach ($res as $row_kw) {
      array_push($keywords, $row_kw["name"]);
    }
    $row["keywords"] = $keywords;
    array_push($search, $row);
  }

  $response["status"] = true;
  $response["data"] = $search;
  return $response;
}