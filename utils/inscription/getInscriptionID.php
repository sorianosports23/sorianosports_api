<?php
 include_once "../database/connection.php";

 function getInscription($id){
  global $db;

  $query = "SELECT id, name, lastname, birthday, ci, gender, medicalRecord, expiration, city, residence, phone, email, schoolYear, alternativePhone, sporTTimeStart, sportTimeEnd, activity, activityPlace, anotherSports, oldPractisedSport, medicalAssistence, whatMedicalCare, medicalAssistencePhone, bloodGroup, diabetes, hypertension, fractures, allergy, asthma, otherDiseases, wearGlasses, whatTypeGlasses, state FROM inscriptionForm WHERE id = ?";
  $stmt = $db->prepare($query);
  $stmt->bind_param("i", $id);
  $res = $stmt->execute();
  $result = $stmt->get_result();

  $resultData = [
    "status" => false,
    "data" => [

    ]
  ];

  // $result = $db->query($query);

  if(!$result){
    $db->close();
    return $resultData;
  }

  $resultFetch = $result->fetch_assoc();
  $resultData["status"] = true;
  $resultData["data"] = $resultFetch;
  return $resultData;

 }
?>