<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate package dimensions and total declared value
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

        echo "<>" . "Hello" . "</h1>";
        echo $first_name;
        echo $last_name;
        echo $street_address;
        echo $city;
        echo $state; 
        echo $zip_code;
        echo $ship_date; 
        echo $order_number;
    }
}
?>
