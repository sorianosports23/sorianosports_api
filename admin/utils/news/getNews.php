<?php
  include_once "../database/connection.php";

  function getNews(int $pag) {
    global $db;

    $sql = "SELECT id, name, description, author, date FROM news";
    $result = $db->query($sql);
    
    $limit = 10;

    $newsCount = $result->num_rows;

    $totalPages = round($newsCount / 10) + 1;
    
    $index = $pag*10;
    
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

    for ($i = $index; $i < $maxIndex; $i++) {
      $resUser = $result->data_seek($i);
      $row = $result->fetch_assoc();
      $row["image"] = "/news/getNewsImg.php?id=".$row["id"];
     
      array_push($events, $row);
    }
    
    $response["data"] = $events;
    $db->close();
    return $response;
  }
?>