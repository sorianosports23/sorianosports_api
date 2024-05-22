<?php
include_once "../database/connection.php";
include_once "../utils/users/getPermissions.php";

function getUsers(int $pag)
{
  global $db;

  $pageSql = $pag * 10;

  $sql = "SELECT username, fullname, age, email, phone, ci, (SELECT count(id) FROM users) as totalRows FROM users LIMIT 10 OFFSET :pageOffset";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(":pageOffset", $pageSql);
  $stmt->execute();
  $result = $stmt->fetchAll();

  $usersCount = count($result) > 0 ? $result[0]['totalrows'] : 0;

  $totalPages = round($usersCount / 10);

  $index = $pag * 10;

  $maxIndex = $index + 10;

  if ($maxIndex > $usersCount) {
    $maxIndex = $usersCount;
  }

  $response = [
    "status" => true,
    "data" => [],
    "pagination" => [
      "totalPages" => $totalPages,
      "currentPage" => $pag + 1,
      "maxUsers" => $usersCount
    ]
  ];

  if ($index > $usersCount) {
    echo json_encode($response);
    die();
  }

  $users = [];

  foreach ($result as $row) {
    $userPerms = getPermissionsFromUser($row["username"]);

    $row["permissions"] = $userPerms;

    array_push($users, $row);
  }

  $response["data"] = $users;
  return $response;
}