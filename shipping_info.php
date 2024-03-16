<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate package dimensions and total declared value
    // Kelvin Zamor, IT 202 Section 006, Phase 3 Assignment:  Create SQL Data using PHP, 3/16/24
    $length = $_POST["length"];
    $width = $_POST["width"];
    $height = $_POST["height"];
    $declared_value = $_POST["declared_value"];
    
    $errors = [];
    
    if ($declared_value > 1000) {
        $errors[] = "Total declared value cannot be more than $1,000.";
    }
    
    if ($length > 36 || $width > 36 || $height > 36) {
        $errors[] = "No dimension of the package can be more than 36 inches.";
    }
    
    
    if (!preg_match("/^\d{5}(-\d{4})?$/", $_POST["zip_code"])) {
        $errors[] = "Please enter a valid ZIP code.";
    }
    
    if (!empty($errors)) {
        // Display errors
        foreach ($errors as $error) {
            echo "<p class='error'>$error</p>";
        }
    } else {
        // Process form data
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $street_address = $_POST["street_address"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $zip_code = $_POST["zip_code"];
        $ship_date = $_POST["ship_date"];
        $order_number = $_POST["order_number"];

        echo "<h1>SHIP TO:</h1>";
            echo "<div></div>";
            echo $first_name ." ". $last_name;
            echo "<div></div>";
            echo $street_address;
            echo "<div></div>";
            echo $city;
            echo "<div></div>";
            echo $state; 
            echo "<div></div>";
            echo $zip_code;
            echo "<div></div>";
            echo $ship_date; 
            echo "<div></div>";
            echo $order_number;
            
            echo "<img src="."./images/fedex.png>" ;
            echo "<div></div>";
            echo "<img src="."./images/label.png>" ;
    }
}
?>


