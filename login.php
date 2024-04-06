<?php 
// Kelvin Zamor, IT 202 Section 006, Phase 4 Assignment: PHP Authentication and Delete SQL Data, 4/5/24
if (!isset($login_message)) {
$login_message = 'You must login to view this page.';
}
?>
<!DOCTYPE html>
<html>
 <head>
   <title>Z-Fit Recovery Tools</title>
   <link rel="stylesheet" href="login.css"/>
 </head>
 <body>
 <nav>
 <a href="home.php">HOME</a> |
            <a href="product_page.php">PRODUCTS</a> |
            <?php
            
            
            if (isset($_SESSION['is_valid_admin'])){

                echo " <a href=\"shipping.php\">SHIPPING</a> |";
                echo " <a href=\"create.php\">CREATE</a> |";
                echo " <a href=\"logout.php\">Log Out</a> |";
                echo "<p> Welcome {$getCredentials['firstName']} {$getCredentials['lastName']} ({$getCredentials['emailAddress']}) <p>";
            }

            else{
                echo " <a href=\"login.php\">Log In</a> |";
            }

            ?>
        </nav>
   <h1>Z-Fit Recovery Tools</h1>
 <main>
   <h1>Login</h1>
   <form action="authenticate.php" method="post">
     <label>Email:</label>
     <input type="text" name="email" value="">
     <br>
     <label>Password:</label>
     <input type="password" name="password" value="">
     <br>
     <input type="submit" value="Login">
   </form>
   <p><?php echo $login_message; ?></p>
 </main>
 </body>
</html>