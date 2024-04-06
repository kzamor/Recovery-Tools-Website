<?php
//Kelvin Zamor, IT 202 Section 006, Phase 4 Assignment: PHP Authentication and Delete SQL Data, 4/5/24
session_start();

$_SESSION = [];  // Clear all session data from memory

session_destroy();     // Clean up the session ID

$login_message = 'You have been logged out.';

include('login.php');


?>
