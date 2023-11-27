<?php
  include_once "../database/connection.php";

  function askPermission($username){
    global $db;
    
    $query = "SELECT * FROM permission WHERE username = '$username'";
    $result = $db->query($query);

    $grant = false;

    while($row = $result->fetch_assoc()){
      if ($row["permission"] == "admin"){
        $grant = true;
      }
    }

    return $grant;
}

?>