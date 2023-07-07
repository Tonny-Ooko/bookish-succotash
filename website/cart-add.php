<?php
require("common.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $items_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $items_name = $_GET['name'];
    $items_price = $_GET['price'];

    // Create a mysqli connection
    $mysqli = new mysqli("localhost", "root", "", "website");

    // Check for connection errors
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

   // Prepare the SQL statement
$query = "INSERT INTO `user_item`(`items_price`, `items_name`, `items_id`, `status_item`) VALUES (?, ?, ?, 1)";
$stmt = $mysqli->prepare($query);

if ($stmt) {
    // Bind the parameters to the statement
    $stmt->bind_param("isi", $items_price, $items_name, $items_id);

    // Execute the statement
    $stmt->execute();

    // Close the statement
    $stmt->close();



        // Add the item to the cart
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Create an array representing the item
        $item = array(
            'id' => $items_id,
            'name' => $items_name,
            'price' => $items_price
        );

        // Add the item to the cart array
        addToCart($item);

        // Close the mysqli connection
        $mysqli->close();

        // Redirect to cart.php
        header('location: products.php');
        exit();
    }
}

// Function to add an item to the cart
function addToCart($item) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if (array_key_exists($item_id, $_SESSION['cart'])) {
        $_SESSION['cart'][$item_id]++;
    } else {
        $_SESSION['cart'][$item_id] = 1;
    }
}
// Redirect back to cart.php
header("Location: cart.php");
exit();

?>

