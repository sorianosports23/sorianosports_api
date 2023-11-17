<?php
  include_once "../database/connection.php";

  function getInscription() {
    global $db;

    $sql = "SELECT id, name, lastname, birthday, ci, gender, medicalRecord, expiration, city, residence, phone, email, schoolYear, alternativePhone, sporTTimeStart, sportTimeEnd, activity, activityPlace, anotherSports, oldPractisedSport, medicalAssistence, whatMedicalCare, medicalAssistencePhone, bloodGroup, diabetes, hypertension, fractures, allergy, asthma, otherDiseases, wearGlasses, whatTypeGlasses, state FROM inscriptionform ORDER BY id DESC";
    $result = $db->query($sql);

    $response = ["status"=>false];

    $inscription = [];

    while ($row = $result->fetch_assoc()) {
      array_push($inscription, $row);
    }
    
    $response["status"] = true;
    $response["data"] = $inscription;
    $db->close();
    return $response;
  }
?>