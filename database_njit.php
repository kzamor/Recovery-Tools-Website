<?php
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
// Kelvin Zamor, IT 202 Section 006, Phase 2 Assignment: Read SQL Data using PHP, 3/1/24
?>