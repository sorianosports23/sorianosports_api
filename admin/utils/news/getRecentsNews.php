<?php
  include_once "../database/connection.php";

  function getNews() {
    global $db;

    $query = "SELECT id, name, description, author, date FROM news ORDER BY id DESC LIMIT 3";
    $res = $db->query($query);

    if ($res->num_rows > 0) {
      $news = [];

      while ($row = $res->fetch_assoc()) {
        array_push($news, [
          "id" => $row["id"],
          "name" => $row["name"],
          "description" => $row["description"],
          "image" => "/news/getNewsImg.php?id=".$row["id"],
          "author" => $row["author"],
          "date" => $row["date"]
        ]);
      }
      $db->close();
      return [
        "status" => true,
        "data" => $news
      ];
    } else {
      $db->close();
      return [
        "status" => true,
        "data" => []
      ];
    }
  }
?>