<?php
require("common.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products | Ecommerce Store</title>
    <link href="bootstrap.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="jquery.js"></script>
    <script src="bootstrap.min.js"></script>
</head>
<body>
    <?php
    include 'header.php';
    include 'check-if-added.php';
   
    ?>
    <div class="container" id="content">
        <div class="jumbotron home-spacer" id="products-jumbotron">
            <h1>Welcome to our Ecommerce Store!</h1>
            <p>We have the best cameras, watches, and shirts for you. No need to hunt around, we have all in one place.</p>
        </div>
        <hr>
        <div class="row text-center" id="cameras">
            <div class="col-md-3 col-sm-6 home-feature">
                <div class="thumbnail">
                    <img src="5.jpg" alt="">
                    <div class="caption">
                        <h3>Cannon EOS</h3>
                        <p>Price: Ksh. 36000.00</p>
                        <?php if (!isset($_SESSION['email'])) { ?>
                            <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                        <?php } else {
                            if (check_if_added_to_cart(1)) {
                                echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                            } else {
                                $items_name = "Cannon EOS";
                                $items_price = 36000.00;
                                ?>
                                 <!-- Add to cart link -->
     <a href="cart-add.php?id=1&name=<?php echo ($items_name) ? $items_name : ''; ?>&price=<?php echo ($items_price) ? $items_price : ''; ?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>

                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 home-feature">
                <div class="thumbnail">
                    <img src="2.jpg" alt="">
                    <div class="caption">
                        <h3>Nikon DSLR</h3>
                        <p>Price: Ksh. 40000.00</p>
                        <?php if (!isset($_SESSION['email'])) { ?>
                            <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                        <?php } else {
                            if (check_if_added_to_cart(2)) {
                                echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                            } else {
                                $items_name = "Nikon DSLR";
                                $items_price = 40000.00;
                                ?>
                               <!-- Add to cart link -->
                                  <a href="cart-add.php?id=2&name=<?php echo ($items_name) ? $items_name : ''; ?>&price=<?php echo ($items_price) ? $items_price : ''; ?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="3.jpg" alt="">
                        <div class="caption">
                            <h3>Sony DSLR</h3>
                            <p>Price: ksh. 45000.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(3)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    $items_name = "Sony DSLR ";
                                     $items_price = 45000.00;
                                    ?>
                               <!-- Add to cart link -->
                                      <a href="cart-add.php?id=3&name=<?php echo ($items_name) ? $items_name : ''; ?>&price=<?php echo ($items_price) ? $items_price : ''; ?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                      <?php
                                }
                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="4.jpg" alt="">
                        <div class="caption">
                            <h3>Olympus DSLR</h3>
                            <p>Price: ksh. 50000.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(4)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                      $items_name = "Olympus DSLR";
                                      $items_price =  50000.00;
                                    ?>
                              <!-- Add to cart link -->
                                     <a href="cart-add.php?id=4&name=<?php echo ($items_name) ? $items_name : ''; ?>&price=<?php echo ($items_price) ? $items_price : ''; ?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                     <?php 
                                }
                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center" id="watches">
                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="18.jpg" alt="">
                        <div class="caption">
                            <h3>Titan Model #301 </h3>
                            <p>Price: ksh. 13000.00 </p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(5)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                     $items_name = "Titan Model ";
                                      $items_price =  13000.00;
                                    ?>
                                   <!-- Add to cart link -->
                                      <a href="cart-add.php?id=5&name=<?php echo ($items_name) ? $items_name : ''; ?>&price=<?php echo ($items_price) ? $items_price : ''; ?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }
                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="19.jpg" alt="">
                        <div class="caption">
                            <h3>Titan Model #201</h3>
                            <p>Price: ksh. 3000.00 </p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(6)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                     $items_name = "Titan Model ";
                                      $items_price =  3000.00;
                                    ?>
                                     <!-- Add to cart link -->
                                     <a href="cart-add.php?id=6&name=<?php echo ($items_name) ? $items_name : ''; ?>&price=<?php echo ($items_price) ? $items_price : ''; ?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a> <?php
                                }
                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="20.jpg" alt="">
                        <div class="caption">
                            <h3>HMT Milan</h3>
                            <p>Price: ksh. 8000.00 </p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(7)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                     $items_name = "HMT Milan";
                                     $items_price =  8000.00;
                                    ?>
                                    <!-- Add to cart link -->
                                     <a href="cart-add.php?id=7&name=<?php echo ($items_name) ? $items_name : ''; ?>&price=<?php echo ($items_price) ? $items_price : ''; ?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }
                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="21.jpg" alt="">
                        <div class="caption">
                            <h3>Faber Luba #111 </h3>
                            <p>Price: ksh. 18000.00 </p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(8)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    $items_name = "Faber Luba ";
                                     $items_price =  18000.00;

                                    ?>
                                <!-- Add to cart link -->
                                        <a href="cart-add.php?id=8&name=<?php echo ($items_name) ? $items_name : ''; ?>&price=<?php echo ($items_price) ? $items_price : ''; ?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }
                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center" id="shirts">
                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="22.jpg" alt="">
                        <div class="caption">
                            <h3>H&W </h3>
                            <p>Price: ksh. 800.00 </p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(9)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                    $items_name = "H&W ";
                                     $items_price =  800.00;

                                    ?>
                                    <!-- Add to cart link -->
                                     <a href="cart-add.php?id=9&name=<?php echo ($items_name) ? $items_name : ''; ?>&price=<?php echo ($items_price) ? $items_price : ''; ?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }
                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="23.jpg" alt="">
                        <div class="caption">
                            <h3>Luis Phil</h3>
                            <p>Price: ksh. 1000.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(10)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                     $items_name = "Luis Phil ";
                                     $items_price =  1000.00;

                                    ?>
                                     <!-- Add to cart link -->
                                    <a href="cart-add.php?id=10&name=<?php echo ($items_name) ? $items_name : ''; ?>&price=<?php echo ($items_price) ? $items_price : ''; ?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }
                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="24.jpg" alt="">
                        <div class="caption">
                            <h3>John Zok</h3>
                            <p>Price: ksh. 1500.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(11)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                     $items_name = "John Zok";
                                     $items_price =  1500.00;
                                    ?>
                                    <!-- Add to cart link -->
                                    <a href="cart-add.php?id=11&name=<?php echo ($items_name) ? $items_name : ''; ?>&price=<?php echo ($items_price) ? $items_price : ''; ?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }
                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 home-feature">
                    <div class="thumbnail">
                        <img src="25.jpg" alt="">
                        <div class="caption">
                            <h3>Jhalsani</h3>
                            <p>Price: ksh. 1300.00</p>
                            <!--User has to login to purchase the items-->
                            <?php if (!isset($_SESSION['email'])) { ?>
                                <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                <?php
                            } else {
                                //We have created a function to check whether this particular product is added to cart or not.
                                if (check_if_added_to_cart(12)) { //This is same as if(check_if_added_to_cart != 0)
                                    echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                } else {
                                     $items_name = "Jhalsani";
                                     $items_price =  1300.00;

                                    ?>
                                       <!-- Add to cart link -->
                                     <a href="cart-add.php?id=12&name=<?php echo ($items_name) ? $items_name : ''; ?>&price=<?php echo ($items_price) ? $items_price : ''; ?>" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                    <?php
                                }

                            }
                            ?>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <hr>
        </div>

        <?php include("footer.php"); ?>
    </body>

</html>