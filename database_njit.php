<?php
function getDB(){
//slide 24
$dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=kpz2';
$username = 'kpz2';
$password = 'PasswordIT202!';

try {
    $db = new PDO($dsn, $username, $password);
    echo '<p>You are connected to the NJIT database</p>';
}   catch(PDOEXception $ex) {
    $error_message = $ex->getMessage();
    include('database_error.php');
    exit();
}
return $db;
}
// <!--Kelvin Zamor, IT 202 Section 006, Phase 5 Assignment: Read SQL Data with PHP and JavaScript, 4/19/24 -->
?>