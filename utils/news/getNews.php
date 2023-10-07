<?php
  include_once "../database/connection.php";

  function getEvents(int $pag) {
    global $db;

    $sql = "SELECT * FROM news";
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
     
      array_push($events, $row);
    }
    
    $response["data"] = $events;
    $db->close();
    return $response;
  }
?>