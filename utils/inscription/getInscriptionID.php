<?php
include_once "../database/connection.php";

function getInscription($id)
{
  global $db;

  $query = "
    SELECT id, username, name, lastname, birthday, ci, gender, medicalRecord, expiration, city, residence, phone, email, schoolYear, alternativePhone, sportTimeStart, sportTimeEnd, activity, activityPlace, anotherSports, oldPractisedSport, medicalAssistence, whatMedicalCare, medicalAssistencePhone, bloodGroup, diabetes, hypertension, fractures, allergy, asthma, otherDiseases, wearGlasses, whatTypeGlasses, state, startInscription, endInscription 
    FROM inscriptionForm WHERE id = :id
  ";
  $stmt = $db->prepare($query);
  $stmt->bindParam('id', $id);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  $resultData = [
    "status" => false,
    "data" => [

    ]
  ];

  // $result = $db->query($query);

  if (!$result) {
    return $resultData;
  }

  $resultData["status"] = true;
  $resultData["data"] = $result;
  return $resultData;
}