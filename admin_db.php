<?php
// Kelvin Zamor, IT 202 Section 006, Phase 4 Assignment: PHP Authentication and Delete SQL Data, 4/5/24
require_once('database_njit.php');

function is_valid_admin_login($email, $password) {

  $db = getDB();

  $query = 'SELECT password FROM ZFitManagers WHERE emailAddress = :email';

  $statement = $db->prepare($query);

  $statement->bindValue(':email', $email);

  $statement->execute();

  $row = $statement->fetch();

  $statement->closeCursor();  

  if ($row === false) {

    return false;

  } else {

    $hash = $row['password'];

    return password_verify($password, $hash);

  }

}

//get admin details from database

function getCredentials($email) {
    $db = getDB();

    $query = 'SELECT firstName, lastName, emailAddress FROM ZFitManagers WHERE emailAddress = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $getCredentials = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    return $getCredentials;
}

?>