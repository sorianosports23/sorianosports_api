<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Headers: *");
  
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include_once "../utils/inscription/addInscription.php";
    include_once "../utils/userauth.php";

    // $_POST = json_decode(file_get_contents("php://input", true), true);
   
    //1

    if(empty($_POST["name"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "name";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }
    //2
    if(empty($_POST["lastname"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "lastname";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }
    //3
    if(empty($_POST["birthday"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "birthday";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }
    //4
    if(empty($_POST["ci"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "ci";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    // if(empty($_FILES["imageCI"])){
    //   $response["message"] = "No se envio uno de los valores";
    //   $response["input"] = "imageCI";
    //   $response["status"] = false;
    //   echo json_encode($response);
    //   die();
    // }
    //5
    if(!isset($_POST["gender"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "gender";
      $response["status"] = false;
      echo json_encode($response);
      die();  
    }
    //6
    if(!isset($_POST["medicalRecord"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "medicalRecord";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    // if(empty($_POST["expiration"])){
    //   $response["message"] = "No se envio uno de los valores";
    //   $response["input"] = "expiration";
    //   $response["status"] = false;
    //   echo json_encode($response);
    //   die();
    // }

    // if(empty($_FILES["imageMedicalRecord"])){
    //   $response["message"] = "No se envio uno de los valores";
    //   $response["input"] = "imageMedicalRecord";
    //   $response["status"] = false;
    //   echo json_encode($response);
    //   die();
    // }

    //7
    if(empty($_POST["city"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "city";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }
    //8
    if(empty($_POST["residence"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "residence";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }
    //9
    if(empty($_POST["phone"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "phone";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }
    //10
    // if(empty($_POST["email"])){
    //   $response["message"] = "No se envio uno de los valores";
    //   $response["input"] = "email";
    //   $response["status"] = false;
    //   echo json_encode($response);
    //   die();
    // }

    // if(empty($_POST["schoolYear"])){
    //   $response["message"] = "No se envio uno de los valores";
    //   $response["input"] = "schoolYear";
    //   $response["status"] = false;
    //   echo json_encode($response);
    //   die();
    // }

    // if(empty($_POST["alternativePhone"])){
    //   $response["message"] = "No se envio uno de los valores";
    //   $response["input"] = "alternativePhone";
    //   $response["status"] = false;
    //   echo json_encode($response);
    //   die();
    // }

    if(empty($_POST["sportTimeStart"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "sportTimeStart";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(empty($_POST["sportTimeEnd"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "sportTimeEnd";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(empty($_POST["activity"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "activity";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(empty($_POST["activityPlace"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "activityPlace";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    // if(empty($_POST["anotherSports"])){
    //   $response["message"] = "No se envio uno de los valores";
    //   $response["input"] = "anotherSports";
    //   $response["status"] = false;
    //   echo json_encode($response);
    //   die();
    // }

    // if(empty($_POST["oldPractisedSport"])){
    //   $response["message"] = "No se envio uno de los valores";
    //   $response["input"] = "oldPractisedSport";
    //   $response["status"] = false;
    //   echo json_encode($response);
    //   die();
    // }

    // if(empty($_POST["practisedSport"])){
    //   $response["message"] = "No se envio uno de los valores";
    //   $response["input"] = "practisedSport";
    //   $response["status"] = false;
    //   echo json_encode($response);
    //   die();
    // }

    if(!isset($_POST["medicalAssistence"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "medicalAssistence";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    // if(empty($_POST["whatMedicalCare"])){
    //   $response["message"] = "No se envio uno de los valores";
    //   $response["input"] = "whatMedicalCare";
    //   $response["status"] = false;
    //   echo json_encode($response);
    //   die();
    // }

    // if(empty($_POST["medicalAssitencePhone"])){
    //   $response["message"] = "No se envio uno de los valores";
    //   $response["input"] = "medicalAssistencePhone";
    //   $response["status"] = false;
    //   echo json_encode($response);
    //   die();
    // }

    // if(empty($_POST["bloodGroup"])){
    //   $response["message"] = "No se envio uno de los valores";
    //   $response["input"] = "bloodGroup";
    //   $response["status"] = false;
    //   echo json_encode($response);
    //   die();
    // }

    if(!isset($_POST["diabetes"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "diabetes";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(!isset($_POST["hypertension"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "hypertension";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(!isset($_POST["fractures"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "fractures";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(!isset($_POST["allergy"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "allergy";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    if(!isset($_POST["asthma"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "asthma";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    // if(empty($_POST["otherDiseases"])){
    //   $response["message"] = "No se envio uno de los valores";
    //   $response["input"] = "otherDiseases";
    //   $response["status"] = false;
    //   echo json_encode($response);
    //   die();
    // }

    if(!isset($_POST["wearGlasses"])){
      $response["message"] = "No se envio uno de los valores";
      $response["input"] = "wearGlasses";
      $response["status"] = false;
      echo json_encode($response);
      die();
    }

    // if(empty($_POST["whatTypeGlasses"])){
    //   $response["message"] = "No se envio uno de los valores";
    //   $response["input"] = "whatTypeGlasses";
    //   $response["status"] = false;
    //   echo json_encode($response);
    //   die();
    // }

    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $birthday = $_POST["birthday"];
    $ci = $_POST["ci"];
    $imageCI = $_FILES["imageCI"] ?? NULL;
    $gender = $_POST["gender"];
    $medicalRecord = $_POST["medicalRecord"];
    $expiration = $_POST["expiration"] ?? NULL;
    $imageMedicalRecord = $_FILES["imageMedicalRecord"] ?? NULL;
    $city = $_POST["city"];
    $residence = $_POST["residence"];
    $phone = $_POST["phone"];
    $email = $_POST["email"] ?? NULL;
    $schoolYear = $_POST["schoolYear"] ?? NULL;
    $alternativePhone = $_POST["alternativePhone"] ?? NULL;
    $sportTimeStart = $_POST["sportTimeStart"];
    $sportTimeEnd = $_POST["sportTimeEnd"];
    $activity = $_POST["activity"];
    $activityPlace = $_POST["activityPlace"];
    $anotherSports = $_POST["anotherSports"] ?? NULL;
    $oldPractisedSport = $_POST["oldPractisedSport"] ?? NULL;
    $medicalAssitence = $_POST["medicalAssistence"];
    $whatMedicalCare = $_POST["whatMedicalCare"] ?? NULL;
    $medicalAssitencePhone = $_POST["medicalAssistencePhone"] ?? NULL;
    $bloodGroup = $_POST["bloodGroup"] ?? NULL;
    $diabetes = $_POST["diabetes"];
    $hypertension = $_POST["hypertension"];
    $fractures = $_POST["fractures"];
    $allergy = $_POST["allergy"];
    $asthma = $_POST["asthma"];
    $otherDiseases =$_POST["otherDiseases"] ?? NULL;
    $wearGlasses = $_POST["wearGlasses"];
    $whatTypeGlasses = $_POST["whatTypeGlasses"] ?? NULL;
    $state = 1;

    echo json_encode(addInscription($username, $name, $lastname, $birthday, $ci, $imageCI, $gender, $medicalRecord, $expiration, $city, $residence, $phone, $email, $schoolYear, $alternativePhone, $sportTimeStart, $sportTimeEnd, $activity, $activityPlace, $anotherSports, $oldPractisedSport, $medicalAssitence, $whatMedicalCare, $medicalAssitencePhone, $bloodGroup, $diabetes, $hypertension, $fractures, $allergy, $asthma, $otherDiseases, $wearGlasses, $whatTypeGlasses, $state, $imageMedicalRecord));
  }