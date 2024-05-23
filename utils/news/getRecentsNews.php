<?php
include_once "../database/connection.php";

function getNews()
{
  global $db;

  $query = "SELECT id, name, description, author, date FROM news ORDER BY id DESC LIMIT 3";
  $stmt = $db->prepare($query);
  $stmt->execute();
  $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (count($res) > 0) {
    $news = [];

    foreach ($res as $row) {
      array_push($news, [
        "id" => $row["id"],
        "name" => $row["name"],
        "description" => $row["description"],
        "image" => "/news/getNewsImg.php?id=" . $row["id"],
        "author" => $row["author"],
        "date" => $row["date"]
      ]);
    }
    return [
      "status" => true,
      "data" => $news
    ];
  } else {
    return [
      "status" => true,
      "data" => []
    ];
  }
}