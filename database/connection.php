<?php
$HOST = "localhost";
$PORT = "5432";
$DATABASE = "apiSPT";
$USER = "postgres";
$PASSWORD = "admin";

$conn_string = "pgsql:host=$HOST;port=$PORT;dbname=$DATABASE;user=$USER;password=$PASSWORD";

try {
  $db = new PDO($conn_string);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (\Throwable $th) {
  header("Content-Type: application/json");
  $response = [
    "status" => false,
    "message" => "No se pudo realizar la conexión con la base de datos",
    "data" => $th->getMessage()
  ];
  echo json_encode($response);
  die();
}