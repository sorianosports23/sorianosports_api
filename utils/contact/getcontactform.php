<?php
  include_once "../database/connection.php";

  function getContact(int $pag) {
    global $db;

    $sql = "SELECT * FROM contact ORDER BY id desc";
    $result = $db->query($sql);
    
    $limit = 10;

    $contactsCount = $result->num_rows;

    $totalPages = round($contactsCount / 10) + 1;
    
    $index = $pag*10;
    
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

    for ($i = $index; $i < $maxIndex; $i++) {
      $resUser = $result->data_seek($i);
      $row = $result->fetch_assoc();
     
      array_push($contact, $row);
    }
    
    $response["data"] = $contact;
    $db->close();
    return $response;
  }
?>