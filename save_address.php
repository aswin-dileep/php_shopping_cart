<?php 
include("server/connect.php");
include("layout/header.php");


if(isset($_POST["address_btn"])){
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone =$_POST['phone'];
    $city = $_POST['city'];
    $address = mysqli_real_escape_string($con,$_POST['address']);

    $save_address = mysqli_query($con,"INSERT INTO user_address (user_id,name,email,phone,city,address) VALUES('$user_id','$name','$email','$phone','$city','$address');");

    if(!$save_address){
        echo "<script>alert('Somthing went wrong the address is not saved')</script>";
        header("refresh:0;url=address.php?user_id=$user_id");
    }else{
        echo "<script>alert('Address added Successfully ')</script>";
        header("refresh:0;url=address.php?user_id=$user_id");
    }
}else{
    echo '<h1>not posted</h1>';
}


?>