<?php
  include_once "../database/connection.php";

  function getCityForSport($nameSport){
    global $db;

    $stmt = $db->prepare("SELECT nameCity FROM cityPlace WHERE nameSport = ? ");
    $stmt->bind_param('s', $nameSport);

    $stmt->execute();

    $result = $stmt->get_result();
    $citiesSports = [];
    

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        array_push($citiesSports, $row["nameCity"]);
      }
      return $citiesSports;
    } else {
      return [];
    }

    $stmt->close();
  }
?>