<?php
// <!--Kelvin Zamor, IT 202 Section 006, Phase 5 Assignment: Read SQL Data with PHP and JavaScript, 4/19/24 -->
require_once('admin_db.php');

session_start();


$email = filter_input(INPUT_POST, 'email');

$password = filter_input(INPUT_POST, 'password');

if (is_valid_admin_login($email, $password)) {

  $_SESSION['is_valid_admin'] = true;

  //get credentials from database
  $getCredentials = getCredentials($email);
  if ($getCredentials !== false){
    $_SESSION['is_valid_admin'] = true;
    $_SESSION['getCredentials'] = $getCredentials;
  }

  // redirect logged in user to home page
  
  echo "<p>You have successfully logged in.</p>";
  include('home.php');

} else {

 if ($email == NULL && $password == NULL) {

  $login_message ='You must login to view this page.';

 } else {

  $login_message = 'Invalid credentials.';

 }

  include('login.php');
  

}

?>