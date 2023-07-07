<?php

require("common.php");
if (!isset($_SESSION['email'])) {
    header('location: index.php');
}
$user_id = $_SESSION['user_id'];
$items_ids_string = $_GET['itemsid'];

$items_ids = explode(',', $items_ids_string);

$items_ids_string = array_filter($items_ids,function($id){
    return is_numeric($id);
});
$items_ids_string = implode(',', $items_ids);
if (!empty($items_ids_string)) {
    $items_ids_string = implode(',', $items_ids);
//We will change the status of the items purchased by the user to 'Confirmed'
$query = "UPDATE user_item SET status=2 WHERE user_id=" . $user_id . " AND items_id IN (" . $items_ids_string . ") AND status= 1 ";
mysqli_query($con, $query) or die(mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <title>Success | Ecommerce Store</title>
        <link href="bootstrap.css" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <?php include 'header.php'; ?>

        <div class="container-fluid" id="content">
            <div class="col-md-12">
                <div class="col-lg-4 col-md-6 ">
                    <img src="thanks.png" style="float: left;">
                </div>
                <div class="jumbotron">
                      <h3 align="center">DONE DEAL YAYY!! Your order is confirmed. Thank you for shopping with us.</h3><hr>
                    <p align="center">Click <a href="products.php">here</a> to purchase any other item.</p>
                </div>
            </div>
        </div>
        <?php include("footer.php");
        ?>
    </body>
</html>