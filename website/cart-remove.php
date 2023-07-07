<?php

require("common.php");
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $items_id = $_GET["items_id"]; 
    $user_id = $_SESSION['user_id'];
    
    // Delete the rows from user_items table where item_id and user_id equal to the item_id and user_id we got from the cart page and session
    $query = "DELETE FROM user_item WHERE items_id='$items_id' AND user_id='$user_id' AND status_item= 1";
    $res = mysqli_query($con, $query) or die($mysqli_error($con));
    header("location:cart.php");
}
?>