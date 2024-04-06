<?php
require_once('database_njit.php');

function addZFitmanager($email, $password, $firstName, $lastName) {
    $db = getDB();
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $dateCreated = date('Y-m-d H:i:s'); 
    $query = 'INSERT INTO ZFitManagers (emailAddress, password, firstName, lastName, dateCreated)
              VALUES (:email, :password, :firstName, :lastName, :dateCreated)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $hash);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':dateCreated', $dateCreated);
    $statement->execute();
    $statement->closeCursor();
}

//addZFitmanager('kpz2@njit.edu', 'IT202', 'Kelvin', 'Zamor');
//addZFitmanager('admin@njit.edu', 'IT202', 'admin', '1');
//addZFitmanager('admin2@njit.edu', 'IT202', 'admin', '2');

//Kelvin Zamor, IT 202 Section 006, Phase 4 Assignment: PHP Authentication and Delete SQL Data, 4/5/24
?>