<?php 
include('connect.php');

$qry ="select * from products where product_category='Travel bags' limit 4";

$result=mysqli_query($con,$qry);

?>