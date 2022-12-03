<?php
session_start();
include('./connect.php');
if (isset($_POST['place_order'])) {


    //get user info and store them in the Order table

    $name = $_POST['checkout-name'];
    $phone = $_POST['checkout-phone'];
    $email = $_POST['checkout-email'];
    $city = $_POST['checkout-city'];
    $address = $_POST['checkout-address'];
    $order_cost = $_SESSION['total'];
    $order_status = "oh hold";
    $user_id = 1;
    $order_date = date('Y-m-d h:i:sa');
    $checkout_qry = "INSERT INTO orders (order_cost,order_status,user_id,user_phone,user_city,user_address,order_date) VALUES('$order_cost'
    ,'$order_status','$user_id','$phone','$city','$address','$order_date')";

    mysqli_query($con, $checkout_qry);

    $order_id = mysqli_insert_id($con);



    // get the products form the cart
    $_SESSION['cart'];
    foreach ($_SESSION['cart'] as $key => $value) {
        $product = $_SESSION['cart'][$key];
        $product_id = $product['product_id'];
        $product_name = $product['product_name'];
        $product_price = $product['product_price'];
        $product_image = $product['product_image'];
        $product_quantity = $product['product_quantity'];

        // store items in order items database 
        $order_items_qry = "INSERT INTO order_items (order_id,product_id,product_name,product_image,product_price,product_quantity,
        user_id,order_date) VALUES('$order_id','$product_id','$product_name','$product_image','$product_price','$product_quantity','$user_id','$order_date')";

        mysqli_query($con, $order_items_qry);
    }




    header('location:../payment.php?order_status="order placed successfully"');
} else {
    echo '<script>alert("Something went wrong");</script>';
}
