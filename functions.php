<?php
    //require MySQL Connection
    require('database/DBController.php');

    //require User Class
    require('database/User.php');

    //require Product Class
    require('database/Product.php');

    //require Cart Class
    require('database/Cart.php');

    //DBController object
    $db = new DBController();

    //Product object
    $product = new Product($db);
    $product_shuffle = $product -> getData();

    //Cart object
    $Cart = new Cart($db);
    $User = new User($db);

    //TEST INSERT
    // $arr = array(
    //     "user_id" => 2,
    //     "item_id" => 9
    // );
    // $Cart -> insertIntoCart($arr);
?>