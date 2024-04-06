<?php
// Kelvin Zamor, IT 202 Section 006, Phase 4 Assignment: PHP Authentication and Delete SQL Data, 4/5/24
// TODO use database_local.php OR database_njit.php
require_once('database_njit.php');

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$db = getDB();
$getCredentials = isset($_SESSION['getCredentials']) ? $_SESSION['getCredentials'] : null;
// Get category ID
$category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
if ($category_id == NULL || $category_id == FALSE) {
  $category_id = 1;
}

// Get name for selected category
$queryCategory = 'SELECT * FROM recoveryToolCategories
          WHERE recoveryToolCategoryID = :category_id';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['recoveryToolCategoryName'];
$statement1->closeCursor();

// Get all categories
$queryAllCategories = 'SELECT * FROM recoveryToolCategories
             ORDER BY recoveryToolCategoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get products for selected category
$queryProducts = 'SELECT recoveryToolCode, recoveryToolName, description, price FROM recoveryTools
          WHERE recoveryToolCategoryID = :category_id
          ORDER BY recoveryToolID';
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$products = $statement3->fetchAll();
$statement3->closeCursor();
?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
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
  <title>Product Page</title>
  <link rel="stylesheet" href="product_page.css" />
</head>

<!-- the body section -->
<body>
<main>
  <h1>Product Page</h1>
  <aside>
    <!-- display a list of categories -->
    <h2>Categories</h2>
    <nav>
    <ul>
      <?php foreach ($categories as $category) : ?>
      <li>
        <a href="?category_id=<?php 
            echo $category['recoveryToolCategoryID']; 
            ?>">
          <?php echo $category['recoveryToolCategoryName']; ?></a>
      </li>
      <?php endforeach; ?>
    </ul>
    </nav>       
  </aside>

  <section>
    <!-- display a table of products -->
    <h2><?php echo $category_name; ?></h2>
    <table>
      <tr>
        <th>Code</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
      </tr>

      <?php foreach ($products as $product) : ?>
      <tr>
        <td><?php echo $product['recoveryToolCode']; ?></td>
        <td><?php echo $product['recoveryToolName']; ?></td>
        <td><?php echo $product['description']; ?></td>
        <td><?php echo $product['price']; ?></td>
        <!--delete only appears if user is logged in-->
        <?php if (isset($_SESSION['is_valid_admin'])) : ?>
        <td>
        <form action="delete.php" method="post">
          <input type="hidden" name="recoveryToolCode" value="<?php echo $product['recoveryToolCode']; ?>">
          <input type="submit" value="Delete">
        </form>
        </td>
        <?php endif; ?>
      </tr>
      <?php endforeach; ?>      
    </table>
  </section>
</main>  
<footer>  
        <h5>
        <p>Z-Fit Recovery Tools | Founded in 2020 | 323 Dr Martin Luther King Jr Blvd, Newark, NJ 07102| 973-444-9015 | kpz2@njit.edu </p>
        </h5>
  </footer>
</body>
</html>