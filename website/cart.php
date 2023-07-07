<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//session_start();
require("common.php");

if (!isset($_SESSION['email'])) {
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart | Ecommerce Store</title>
    <link href="bootstrap.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="jquery.js"></script>
    <script src="bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid" id="content">
        <?php
        include 'header.php';
        ?>

        <div class="col-lg-4 col-md-6">
            <br><br>
            <img src="confirmorder.png" style="float: left;">
        </div>

        <style>
            table {
                border-collapse: collapse;
                margin: 0 auto;
            }

            th, td {
                border: 2px solid black;
                padding: 8px;
            }
        </style>

        <?php
        // Start the session (if not already started)
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {
            // Handle the case when the user is not logged in
        }

        // Connect to the database
        $mysqli = new mysqli('localhost', 'root', '', 'website');

        // Check connection
        if ($mysqli->connect_error) {
            die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }

        // Retrieve items from the cart
        $cartItems = array();
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $itemIds = array_keys($_SESSION['cart']);
            $itemIdsString = implode(',', $itemIds);

            $query = "SELECT items_id, items_name, items_price FROM user_item WHERE items_id IN ($itemIdsString)";
            $stmt = $mysqli->prepare($query);

            if ($stmt) {
                $stmt->execute();
                $result = $stmt->get_result();

                while ($row = $result->fetch_assoc()) {
                    $itemId = $row['items_id'];
                    $item = $_SESSION['cart'][$itemId];
                    $item['name'] = $row['items_name'];
                    $item['price'] = $row['items_price'];
                    $cartItems[$itemId] = $item;

                    // Insert the item into the "items" table using prepared statements
                    $insertQuery = "INSERT INTO items (item_name, item_price) VALUES (?, ?)";
                    $insertStmt = $mysqli->prepare($insertQuery);

                    if ($insertStmt) {
                        $insertStmt->bind_param("ss", $item['name'], $item['price']);
                        $insertStmt->execute();
                        echo "Item inserted successfully: " . $item['name'];
                    } else {
                        echo "Failed to insert item: " . $item['name'];
                    }
                }

                $stmt->close();
            }
        }

        // Close the mysqli connection
        $mysqli->close();
        ?>

        <style>
            .center-table {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                border: 2px solid black;
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: black;
                color: white;
            }
        </style>

        <h1>Cart</h1>
        <?php if (!empty($cartItems)) : ?>
            <div class="center-table">
                <table>
                    <tr>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($cartItems as $itemId => $item) : ?>
                        <tr>
                            <td><?php echo $itemId; ?></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['price']; ?></td>
                            <td>
                                <button class="confirm-button"
                                        onclick="confirmItem(<?php echo $itemId; ?>)">Confirm
                                </button>
                                <button class="remove-button"
                                        onclick="removeItem(<?php echo $itemId; ?>)">Remove
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php else : ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>

        <script>
            function confirmItem(itemId) {
                // Implement the confirmation logic here
                console.log("Confirmed item: " + itemId);
            }

            function removeItem(itemId) {
                // Implement the removal logic here
                console.log("Removed item: " + itemId);
            }
        </script>
    </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>

       