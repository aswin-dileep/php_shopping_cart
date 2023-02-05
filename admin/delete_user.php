<?php 
include("header.php");

if(isset($_GET['user_id'])){

     $user_id =$_GET['user_id'];
     $delete_user=mysqli_query($con,"DELETE FROM users WHERE user_id='$user_id' ");
      
     if(!$delete_user){
        echo"<script>alert('error the user is not deleted')</script>";
     }else{
        echo "<script>alert('User Deleted Successfully')</script>";
     }
    
     header("refresh:0;url=account.php");

}

?>