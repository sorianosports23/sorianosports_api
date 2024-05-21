<?php
include_once "../database/connection.php";

function getEvents(int $pag)
{
  global $db;

  $pageSql = $pag * 10;

  $sql = "SELECT id, name, city, place, time, sport, date_ev, description, check_great, (SELECT count(id) FROM event) as totalRows FROM event LIMIT 10 OFFSET :pageOffset";
  $stmt = $db->prepare($sql);
  $stmt->bindParam("pageOffset", $pageSql);
  $stmt->execute();

  $result = $stmt->fetchAll();

  $eventsCount = count($result) > 0 ? $result[0]['totalRows'] : 0;

  $totalPages = round($eventsCount / 10) + 1;

  $index = $pag * 10;

  $maxIndex = $index + 10;

  if ($maxIndex > $eventsCount) {
    $maxIndex = $eventsCount;
  }

  $response = [
    "status" => true,
    "data" => [],
    "pagination" => [
      "totalPages" => $totalPages,
      "currentPage" => $pag + 1
    ]
  ];

  if ($index > $eventsCount) {
    echo json_encode($response);
    die();
  }

  $events = [];

  foreach ($result as $row) {
    array_push($events, $row);
  }

  $response["data"] = $events;
  return $response;
}