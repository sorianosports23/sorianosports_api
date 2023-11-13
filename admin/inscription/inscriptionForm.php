<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include_once "../utils/addusertodb.php";

    $DATA = json_decode(file_get_contents("php://input", true), true);
  
    if(empty($DATA["name"])){
      $return["message"] = "No ingresaste uno de los valores";
      $return["err"] = "name";
      json_encode($return);
      die();
    }

    if(empty($DATA["lastname"])){

    }
  
    if(empty($DATA["birthday"])){

    }

    if(empty($DATA["ci"])){

    }

    if(empty($DATA["gender"])){
      
    }

    if(empty($DATA["medicalRecord"])){

    }

    if(empty($DATA["city"])){

    }

    if(empty($DATA["residence"])){

    }

    if(empty($DATA["phone"])){

    }

    if(empty($DATA["email"])){

    }

    if(empty($DATA["schoolYear"])){

    }

    if(empty($DATA["alternativePhone"])){

    }

    if(empty($DATA["activity"])){

    }

    if(empty($DATA["activityPlace"])){

    }

    if(empty($DATA["anotherSports"])){

    }

    if(empty($DATA["practisedSport"])){

    }

    if(empty($DATA["medicalAssitence"])){

    }

    if(empty($DATA["bloodGroup"])){

    }

    if(empty($DATA["diseases"])){

    }

    if(empty($DATA)) {
      
    }
    $name = $DATA["name"];
    $lastname = $DATA["lastname"];
    $birthday = $DATA["birthday"];
    $ci = $DATA["ci"];
    $gender = $DATA["gender"];
    $medicalRecord = $DATA["medicalRecord"];
    $city = $DATA["city"];
    $residence = $DATA["residence"];
    $phone = $DATA["phone"];
    $email = $DATA["email"];
    $schoolYear = $DATA["schoolYear"];
    $alternativePhone = $DATA["alternativePhone"];
    $activity = $DATA["activity"];
    $activityPlace = $DATA["activityPlace"];
    $anotherSports = $DATA["anotherSports"];
    $practisedSport = $DATA["practisedSport"];
    $medicalAssitence = $DATA["medicalAssistence"];
    $bloodGroup = $DATA["bloodGroup"];
    $diseases = $DATA["diaseases"];
    $wearsGlasses = $DATA["wearsGlasses"];

    echo json_encode(addUser($name, $lastname, $birthday, $ci, $gender, $medicalRecord, $city, $residence, $phone, $email, $schoolYear, $alternativePhone, $activity, $activityPlace, $anotherSports, $practisedSport, $))