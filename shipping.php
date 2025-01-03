<html>
<!--Kelvin Zamor, IT 202 Section 006, Phase 5 Assignment: Read SQL Data with PHP and JavaScript, 4/19/24 -->
    <title>Shipping</title>
    <link rel="stylesheet" href="shipping.css"/>
</head>
<body>
<nav>
    <?php
        session_start();
        $getCredentials = isset($_SESSION['getCredentials']) ? $_SESSION['getCredentials'] : null;
    ?>
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
<h1>Shipping Page</h1>
<h3> To: </h3>
    <form action="shipping_info.php" method="post">
        
    <!--names.-->
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required>
        <br><br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>

        <!--address-->
        <br><br>
        <label for="street_address">Street Address:</label>
        <input type="text" id="street_address" name="street_address" required>
        <br><br>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>
        <br><br>
        <label for="state">State:</label>
        <input type="text" id="state" name="state" required>
        <br><br>
        <label for="zip_code">Zip Code:</label>
        <input type="text" id="zip_code" name="zip_code" required>
        <br><br>
        
        <!--shipping-->
        <label for="ship_date">Ship Date:</label>
        <input type="date" id="ship_date" name="ship_date" required>
        <br><br>
        
        <!--order number-->
        <label for="order_number">Order Number:</label>
        <input type="text" id="order_number" name="order_number" required>
        
         <!--dimensions-->
        <br><br>
        <label for="length">Length (in inches):</label>
        <input type="number" id="length" name="length" required>
        <br><br>
        <label for="width">Width (in inches):</label>
        <input type="number" id="width" name="width" required>
        <br><br>
        <label for="height">Height (in inches):</label>
        <input type="number" id="height" name="height" required>
        <br><br>
        <!--declared value-->
        <label for="declared_value">Total Declared Value:</label>
        <input type="number" id="declared_value" name="declared_value" required>
        <br><br>
        
        <input type="submit" value="Submit">
    </form>

    <footer>
    <h5>
        <p>Z-Fit Recovery Tools | Founded in 2020 | 323 Dr Martin Luther King Jr Blvd, Newark, NJ 07102| 973-444-9015 | kpz2@njit.edu </p>
    </h5>
    </footer>
    
</body>
</html>

