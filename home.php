<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$getCredentials = isset($_SESSION['getCredentials']) ? $_SESSION['getCredentials'] : null;
?>

<html>
    <head>
        <title>Z-Fit Recovery Tools</title>
        <link rel="stylesheet" href="home.css"/>

    </head>
    <body>
        <main>
      
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
        </main>
            <h2>HOME</h2>
            <p>
                Z-Fit Recovery Tools offers a comprehensive array of high-quality fitness recovery gear designed to help you reach your peak performance and recover faster. Our products are meticulously crafted to cater to every aspect of your recovery needs, ensuring that you can bounce back from intense workouts with ease. Z-Fit Recovery Tools was founded in 2020 by Kelvin Zamor, a fitness enthusiast and former basketball athlete. The company was born out of Kelvin's own struggle with post-workout recovery and the lack of quality recovery tools available on the market. Determined to create a solution, Kelvin launched Z-Fit Recovery Tools, with a mission to provide athletes and fitness enthusiasts with innovative recovery products that optimize performance and reduce the risk of injury.
            </p>
            <br></br>
            <img src="./images/foamwork.jpg" alt="Person using foam roller" style="width:200px;height:120px;">
            <br></br>
            <img src="./images/rope.jpg" alt="Athlete working out with rope" style="width:200px;height:120px;">
            <br></br>
            <img src="./images/usemassagegun.jpg" alt="Person using a massage gun" style="width:200px;height:120px;">
            <br></br>
            <img src="./images/usingyogawheel.jpg" alt="Person using a yoga wheel" style="width:200px;height:120px;">

            <?php
                echo $_SESSION['is_valid_admin'];
            ?>
        
        <footer>  
        <h5>
        <p>Z-Fit Recovery Tools | Founded in 2020 | 323 Dr Martin Luther King Jr Blvd, Newark, NJ 07102| 973-444-9015 | kpz2@njit.edu </p>
        </h5>
        </footer>
    </body>
    
</html>
<!--Kelvin Zamor, IT 202 Section 006, Phase 4 Assignment: PHP Authentication and Delete SQL Data, 4/5/24 -->