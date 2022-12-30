<?php 
include("connect.php");
session_start();
$transaction_id =$_POST['stripeToken'];
$order_id=$_POST['order_id'];
$user_id =$_SESSION['user_id'];
$payment_date = date('Y/m/d');

if(isset($_POST['order_id'])&&isset($_POST['stripeToken'])){
    //changing status of the order
    $change_status_qry="UPDATE orders SET order_status='paid' WHERE order_id='$order_id' ";
    mysqli_query($con,$change_status_qry);
    
    //Storing payment info
    $payment_qry ="INSERT INTO payments (order_id,user_id,transaction_id,payment_date) VALUES ('$order_id','$user_id','$transaction_id',$payment_date)";

    mysqli_query($con,$payment_qry);

    header("location: ../Account.php?payment_message=paid successfully,thank you for your shopping with us");

}else{
    header("location:index.php");
    exit;
}
