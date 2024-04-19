<?php
require_once('database_njit.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  $getCredentials = isset($_SESSION['getCredentials']) ? $_SESSION['getCredentials'] : null;

// Get product ID from the URL
$product_id = filter_input(INPUT_GET, 'product_id', FILTER_SANITIZE_STRING);

// Check if product ID is valid
if ($product_id === null || $product_id === false || empty($product_id)) {
    echo "Invalid product ID.";
    exit;
}

// Get product ID from database
$db = getDB();
$query = 'SELECT * FROM recoveryTools WHERE recoveryToolCode = :product_id';
$statement = $db->prepare($query);
$statement->bindValue(':product_id', $product_id);
$statement->execute();
$product = $statement->fetch();
$statement->closeCursor();

// Check if product is valid
if (!$product) {
    echo "Product not found.";
    exit;
}

// Get the image from directory
$image = "./images/" . $product_id . ".jpg";
$imagebw = "./images/" . $product_id . "bw.jpg";

// Display product details
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
    <link rel="stylesheet" href="details.css"/>

    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            var image = "<?php echo $image; ?>";
            var imagebw = "<?php echo $imagebw; ?>";

            // Mouse over event handler
            $('img.product-image').mouseover(function() {
                $(this).attr('src', imagebw);
            });

            // Mouse out event handler
            $('img.product-image').mouseout(function() {
                $(this).attr('src', image);
            });
        });
    </script>
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
        <h1>Product Details</h1>
        <div>
            <h2><?php echo $product['recoveryToolName']; ?></h2>
            <p>Description: <?php echo $product['description']; ?></p>
            <p>Price: <?php echo $product['price']; ?></p>
            <br>
            <img src="<?php echo $image; ?>" class="product-image" height="300" alt="Product Image">
        </div>
    
    
    </body>
</html>
<!--Kelvin Zamor, IT 202 Section 006, Phase 5 Assignment: Read SQL Data with PHP and JavaScript, 4/19/24 -->