<?php
// <!--Kelvin Zamor, IT 202 Section 006, Phase 5 Assignment: Read SQL Data with PHP and JavaScript, 4/19/24 -->
session_start();
$db = getDB();

// Check if recoveryToolCode is provided 
if (isset($_POST['recoveryToolCode'])) {
    // Get the recoveryToolCode
    $recoveryToolCode = $_POST['recoveryToolCode'];

    // Delete query
    $query = 'DELETE FROM recoveryTools WHERE recoveryToolCode = :recoveryToolCode';
    $statement = $db->prepare($query);
    $statement->bindValue(':recoveryToolCode', $recoveryToolCode);
    $deleted = $statement->execute();
    $statement->closeCursor();

    if ($deleted) {
        // Go back so product page and success message
        include('product_page.php');
        echo "Product Successfully Deleted";
    } else {
        // error if deletion fails
        echo "Error: Unable to delete the record.";
    }
} 
?>