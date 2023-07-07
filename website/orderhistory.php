<?php
require("common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Order History | Ecommerce Store</title>
        <link href="bootstrap.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
        <script src="jquery.js"></script>
        <script src="bootstrap.min.js"></script>
         <style>
        html, body {
            height: 100%;
        }
        .site-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            flex: 1;
        }
        .footer {
            background-color: #f5f5f5;
            padding: 20px;
            text-align: center;
        }
    </style>

    </head>
    <body>
        <br><br>
        <div class="container-fluid" id="content">
            <?php include 'header.php'; ?> 
            <div class="content">
            <br><br>
            <div class="container-fluid">
                <div class="row">

            <div class="col-lg-4 col-md-6 ">
                    <img src="cart.jpg" alt="Centered Image" class="centered-image" height="400px" width="600px" style="float: left;">
                </div>
            </div>
            <div class="row decor_bg">
                <div class="col-md-6">
                    <table class="table table-striped">
    
                        <!--show table only if there are items added in the cart-->
       <?php
$results = []; // Initialize an empty array to avoid the undefined variable warning

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Prepare the SQL query using parameterized statements
    $query = "SELECT items.price AS Price, items.id AS id, items.name AS Name, user_item.date_time AS Timedate
              FROM user_item
              JOIN items ON user_item.items_id = items.id
              WHERE user_item.user_id = :user_id AND `status_item` = 1";

    // Prepare and execute the query with parameter binding
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch the results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Process the results as needed
    foreach ($results as $row) {
        // Access the columns using their aliases
        $price = $row['Price'];
        $id = $row['id'];
        $name = $row['Name'];
        $dateTime = $row['Timedate'];

        // Perform desired actions with the retrieved data
        // ...
    }
} else {
    // Handle the case when 'user_id' is not set in the session
    // ...
}
?>

<h1 style="margin-bottom: 20px; font-weight: 20;"><center>Order History</center></h1>
<table style="background-color: firebrick; color: white; border: 4px solid green; border-collapse: collapse;">
    <thead>
        <tr>
            <th>Item name</th>
            <th>Price</th>
            <th>Order & time</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total = 0;
        if (!empty($results)) { // Check if $results is not empty
            foreach ($results as $row) {
                echo '<tr>';
                echo '<td style="padding: 20px;">' . $row["Name"] . '</td>';
                echo '<td style="padding: 30px;">Ke. ' . $row["Price"] . '</td>';
                echo '<td style="padding: 30px;">' . $row["Timedate"] . '</td>';
                echo '</tr>';
                $total += $row["Price"];
            }
            echo '<tr><td colspan="2" style="padding: 20px;">Total</td><td style="padding: 20px;">Ke. ' . $total . '</td></tr>';
        } else {
            echo '<tr><td colspan="3">Sorry! No orders placed yet</td></tr>';
        }
        ?>
    </tbody>
</table>
                       </div>
                </div>
            </div>
        </div>
        <?php include "footer.php"; ?>
        </div>
    </body>
</html>