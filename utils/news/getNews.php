<?php
include_once "../database/connection.php";

function getNews(int $pag)
{
  global $db;

  $pageSql = $pag * 10;

  $sql = "SELECT id, name, description, author, date, (SELECT count(id) FROM news) as totalRows FROM news ORDER BY id DESC LIMIT 10 OFFSET :pageOffset";
  $stmt = $db->prepare($sql);
  $stmt->bindParam("pageOffset", $pagSql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $newsCount = count($result) > 0 ? $result[0]['totalrows'] : 0;

  $totalPages = round($newsCount / 10) + 1;

  $index = $pag * 10;

  $maxIndex = $index + 10;

  if ($maxIndex > $newsCount) {
    $maxIndex = $newsCount;
  }

  $response = [
    "status" => true,
    "data" => [],
    "pagination" => [
      "totalPages" => $totalPages,
      "currentPage" => $pag + 1
    ]
  ];

  if ($index > $newsCount) {
    echo json_encode($response);
    die();
  }

  $events = [];


  foreach ($result as $row) {
    $row["image"] = "/news/getNewsImg.php?id=" . $row["id"];
    array_push($events, $row);
  }

  $response["data"] = $events;
  return $response;
}