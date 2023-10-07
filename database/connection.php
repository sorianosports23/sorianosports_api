<?php
  $username = "root";
  $password = "";
  $server = "localhost";
  $dataBase = "apiSPT";

  $db = new mysqli($server, $username, $password, $dataBase);

  if($db->connect_error){
    die("ERROR DE CONEXION CON BASE DE DATOS!");
  }
?>