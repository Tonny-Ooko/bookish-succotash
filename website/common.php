<!--establish the connection to database, and start the session-->
<?php
$con = mysqli_connect("localhost", "root", "", "website")or die(mysqli_connect_error());
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?>