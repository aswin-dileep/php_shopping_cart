<?php 
session_start();
include("../server/connect.php");



 if(isset($_SESSION['admin_login'])){
    header("location:login.php");
 }





if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $delete_qry = "DELETE FROM products WHERE product_id='$product_id' ";
    if(mysqli_query($con,$delete_qry)){
        echo '<script>alert("product Deleted successfully")</script>';
        header("refresh:0,url=products.php");
    }else{
        echo '<script>alert("Error the product is not deleted")</script>';
        header("refresh:0,url=products.php");
    }
}
?>