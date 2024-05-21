<?php
include_once "../database/connection.php";

function getInscriptionForUsername($username)
{
  global $db;

  $response = [
    "message" => "",
    "status" => false
  ];

  $stmt = $db->prepare("SELECT id, name, lastname, birthday, ci, gender, medicalRecord, expiration, city, residence, phone, email, schoolYear, alternativePhone, sporTTimeStart, sportTimeEnd, activity, activityPlace, anotherSports, oldPractisedSport, medicalAssistence, whatMedicalCare, medicalAssistencePhone, bloodGroup, diabetes, hypertension, fractures, allergy, asthma, otherDiseases, wearGlasses, whatTypeGlasses, state, startInscription, endInscription FROM inscriptionForm WHERE username = :user");
  $stmt->bindParam(':user', $username);
  $stmt->execute();

  $inscription = [];

  $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if ($res) {
    foreach ($res as $row) {
      array_push($inscription, $row);
    }
  }

  $response["status"] = true;
  $response["data"] = $inscription;
  return $response;
}