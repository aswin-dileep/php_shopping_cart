<?php
session_start();
include('./connect.php');


if(!isset($_SESSION['logged_in'])){
    header("location:../checkout.php?message=Please login or register to place order");

}else{


if (isset($_POST['place_order'])) {


    //get user info and store them in the Order table

    $name = $_POST['checkout-name'];
    $phone = $_POST['checkout-phone'];
    $email = $_POST['checkout-email'];
    $city = $_POST['checkout-city'];
    $address = $_POST['checkout-address'];
    $address_id = $_POST['address_id'];
    $order_cost = $_SESSION['total'];
    $order_status = "not paid";
    $user_id = $_SESSION['user_id'];
    $order_date = date('Y/m/d');
    $checkout_qry = "INSERT INTO orders (order_cost,order_status,user_id,address_id,order_date) VALUES('$order_cost','$order_status','$user_id','$address_id','$order_date')";

    mysqli_query($con, $checkout_qry);

    // if(!mysqli_query($con, $checkout_qry)){
    //     header("location:index.php");
    //     exit;
    // }

    $order_id = mysqli_insert_id($con);



    // get the products form the cart
    $_SESSION['cart'];
    foreach ($_SESSION['cart'] as $key => $value) {
        $product = $_SESSION['cart'][$key];
        $product_id = $product['product_id'];
        $product_quantity = $product['product_quantity'];

        // store items in order items database 
        $order_items_qry = "INSERT INTO order_items (order_id,product_id,item_quantity,
        user_id) VALUES('$order_id','$product_id','$product_quantity','$user_id')";

        mysqli_query($con, $order_items_qry);
        //subtraction the value of product quantity in the product table
        $current_quantity=mysqli_query($con,"SELECT product_quantity FROM products WHERE product_id='$product_id' ");
        
        while($row =mysqli_fetch_array($current_quantity)){
            $new_quantity =  $row['product_quantity'] -  (int)$product_quantity ;
       
        }
       
        mysqli_query($con,"UPDATE products SET product_quantity='$new_quantity' WHERE product_id='$product_id' ");
      
    }
    unset($_SESSION['cart']);

    
    $_SESSION['order_id']= $order_id;


    header('location:../payment.php');
} else {
    echo '<script>alert("Something went wrong");</script>';
}
}
