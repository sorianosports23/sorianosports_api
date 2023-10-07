<?php
  header("Content-Type: application/json");
  header("Access-Control-Allow-Origin: *");
  
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include_once "../utils/addusertodb.php";

    $DATA = json_decode(file_get_contents("php://input", true), true);
  
    if (empty($DATA["username"]) || empty($DATA["fullname"]) || empty($DATA["password"]) || empty($DATA["email"]) || empty($DATA["age"]) || empty($DATA["ci"]) || empty($DATA["phone"])) {
      $result["message"] = "No ingresaste uno de los valores.";
      echo json_encode($result);
      $db->close();
      return;
    }
  
    $username = $DATA["username"];
    $fullname = $DATA["fullname"];
    $password = $DATA["password"];
    $email = $DATA["email"];
    $age = $DATA["age"];
    $ci = $DATA["ci"];
    $phone = $DATA["phone"];
  
    echo json_encode(addUser($username, $fullname, $password, $email, $age, $ci, $phone));
  } else {
    echo json_encode([
      "message" => "Metodo equivocado para la peticion",
      "correct_method" => "POST"
    ]);
  }
?>