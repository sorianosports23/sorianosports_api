<?php
  include_once "../database/connection.php";

  function getGreatEvents(int $pag) {
    global $db;

    $sql = "SELECT id, name, description, date, placeLink FROM greatEvents";
    $result = $db->query($sql);
    
    $limit = 10;

    $greatEventsCount = $result->num_rows;

    $totalPages = round($greatEventsCount / 10) + 1;
    
    $index = $pag*10;
    
    $maxIndex = $index + 10;
    
    if ($maxIndex > $greatEventsCount) {
      $maxIndex = $greatEventsCount;
    }
 
    $response = [
      "status" => true,
      "data" => [],
      "pagination" => [
        "totalPages" => $totalPages,
        "currentPage" => $pag + 1
      ]
    ];

    if ($index > $greatEventsCount) {
      echo json_encode($response);
      die();
    }

    $greatEvents = [];

    for ($i = $index; $i < $maxIndex; $i++) {
      $resUser = $result->data_seek($i);
      $row = $result->fetch_assoc();
      $row["image"] = "/greatEvents/getImage.php?id=".$row["id"];
     
      array_push($greatEvents, $row);
    }
    
    $response["data"] = $greatEvents;
    $db->close();
    return $response;
  }
?>