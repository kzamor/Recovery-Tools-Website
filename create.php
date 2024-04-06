<?php
// Kelvin Zamor, IT 202 Section 006, Phase 4 Assignment: PHP Authentication and Delete SQL Data, 4/5/24
require_once('database_njit.php');
$db = getDB();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$getCredentials = isset($_SESSION['getCredentials']) ? $_SESSION['getCredentials'] : null;



// get categories from the database
$queryCategories = 'SELECT recoveryToolCategoryID, recoveryToolCategoryName FROM recoveryToolCategories';
$statement = $db->prepare($queryCategories);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();

// get form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_id = $_POST['category_id'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // price validation
    if (!is_numeric($price) || $price <= 0 || $price > 9999) {
        $error = "Price must be postive, greater than 0, and less than 9999";
    } else {
        // inserting the new product into the database
        $queryInsert = 'INSERT INTO recoveryTools (recoveryToolCategoryID, recoveryToolCode, recoveryToolName, description, price, dateCreated)
                        VALUES (:category_id, :code, :name, :description, :price, NOW())';
        $statement = $db->prepare($queryInsert);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':code', $code);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->execute();
        $statement->closeCursor();

        $success_message = "Product Successfully Created";
    }
}
?>


<html>
<head>
    <title>Create Product</title>
    <link rel="stylesheet" href="create.css"/>
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
    
    <h2>Create Product</h2>

    <!--check error-->
    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="category">Category:</label>
        <select name="category_id" id="category" required>
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['recoveryToolCategoryID']; ?>">
                    <?php echo $category['recoveryToolCategoryName']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <br>
        <br>

        <label for="code">Code:</label>
        <input type="text" id="code" name="code" required>
        
        <br>
        <br>
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <br>
        <br>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        
        <br>
        <br>
        
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" min="0" required>
        
        <br>
        <br>
        
        <input type="reset" value="Reset">
        <input type="submit" value="Create Product">
    </form>

    <!-- show success message -->
    <?php if (!empty($success_message)) : ?>
        <p><?php echo $success_message; ?></p>
    <?php endif; ?>
    
</body>
<footer>  
        <h5>
        <p>Z-Fit Recovery Tools | Founded in 2020 | 323 Dr Martin Luther King Jr Blvd, Newark, NJ 07102| 973-444-9015 | kpz2@njit.edu </p>
        </h5>
        </footer>
</html>