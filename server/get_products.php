<?php 
include('connect.php');

$qry ="select * from products  limit 4";

$result=mysqli_query($con,$qry);

?>