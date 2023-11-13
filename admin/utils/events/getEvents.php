<?php
  include_once "../database/connection.php";

  function getEvents(int $pag) {
    global $db;

    $sql = "SELECT * FROM event";
    $result = $db->query($sql);
    
    $limit = 10;

    $eventsCount = $result->num_rows;

    $totalPages = round($eventsCount / 10) + 1;
    
    $index = $pag*10;
    
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