<?php
  include_once "../database/connection.php";
  include_once "../utils/users/getPermissions.php";

  function getUsers(int $pag) {
    global $db;

    // trae toda esa informacion de la tabla usuarios
    $sql = "SELECT username, fullname, age, email, phone, ci FROM users";
    $result = $db->query($sql);
    
    // el limite de usuarios a mostrar es 10
    $limit = 10;

    $usersCount = $result->num_rows; //cuenta la cantidad de usuarios totales

    $totalPages = round($usersCount / 10); // calcula la cantidad de paginas (mostrando solo 10 usuarios por pagina)
    
    $index = $pag*10; // el index desde donde empieza a mostrar los usuarios
    
    $maxIndex = $index + 10; // el maximo index que seria el index + 10 pq solo muestra 10 usuarios
    
    if ($maxIndex > $usersCount) { // si el maximo index es mayor a los usuarios totales entonces se remplaza el maximo por la cantidad total
      $maxIndex = $usersCount; // asi el for no lanza errores si supera la cantidad de usuarios
    }
 
    $response = [ // la respuesta al cliente
      "status" => true,
      "data" => [],
      "pagination" => [
        "totalPages" => $totalPages,
        "currentPage" => $pag + 1,
        "maxUsers" => $usersCount
      ]
    ];

    if ($index > $usersCount) { // si el cliente por ejemplo pide la pagina 5 y no hay mas de 50 usuarios entonces no manda los usuarios
      echo json_encode($response);
      die();
    }

    $users = [];

    for ($i = $index; $i < $maxIndex; $i++) { // recorre los usuarios segun las variables anteriores
      $resUser = $result->data_seek($i); // extrae la informacion del usuario en la posicion $i
      $row = $result->fetch_assoc();

      $userPerms = getPermissionsFromUser($row["username"]); // trae los permisos del usuario desde esa funcion
      
      $row["permissions"] = $userPerms;

      array_push($users, $row); // añade el usuario al arreglo
    }
    
    $response["data"] = $users; // se muestra los usuarios en la respuesta
    $db->close();
    return $response; // se manda la respuesta :]
  }

?>