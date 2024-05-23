<?php
include_once "../database/connection.php";

function getContact(int $pag)
{
  global $db;

  $pageSql = $pag * 10;

  $sql = "SELECT *, (SELECT count(id) FROM contact) as totalrows FROM contact ORDER BY id DESC LIMIT 10 OFFSET :pageOffset ";
  $stmt = $db->prepare($sql);
  $stmt->bindParam("pageOffset", $pageSql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $contactsCount = count($result) > 0 ? $result[0]["totalrows"] : 0;

  $totalPages = round($contactsCount / 10) + 1;

  $index = $pag * 10;

  $maxIndex = $index + 10;

  if ($maxIndex > $contactsCount) {
    $maxIndex = $contactsCount;
  }

  $response = [
    "status" => true,
    "data" => [],
    "pagination" => [
      "totalPages" => $totalPages,
      "currentPage" => $pag + 1
    ]
  ];

  if ($index > $contactsCount) {
    echo json_encode($response);
    die();
  }

  $contact = [];

  foreach ($result as $row) {
    array_push($contact, $row);
  }

  $response["data"] = $contact;
  return $response;
}