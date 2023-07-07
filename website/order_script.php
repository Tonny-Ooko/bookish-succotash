<?php
require("common.php");
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $items_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $query = "INSERT INTO `user_item`(`user_id`, `items_id`, `status_item`) VALUES($user_id, $items_id, 1)";
    mysqli_query($con, $query)  or die(mysqli_error($con));
    header('location: success.php');
}
?>  