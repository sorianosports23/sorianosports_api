<?php
include_once "../database/connection.php";

function getInscription()
{
  global $db;

  $sql = "SELECT id, name, lastname, birthday, ci, gender, medicalRecord, expiration, city, residence, phone, email, schoolYear, alternativePhone, sporTTimeStart, sportTimeEnd, activity, activityPlace, anotherSports, oldPractisedSport, medicalAssistence, whatMedicalCare, medicalAssistencePhone, bloodGroup, diabetes, hypertension, fractures, allergy, asthma, otherDiseases, wearGlasses, whatTypeGlasses, state, startInscription, endInscription FROM inscriptionform ORDER BY id DESC";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $response = ["status" => false];

  $inscription = [];

  foreach ($result as $row) {
    array_push($inscription, $row);
  }

  $response["status"] = true;
  $response["data"] = $inscription;
  return $response;
}