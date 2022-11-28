<?php 
include('connect.php');

$qry ="select * from products where product_category='Handbags' limit 4";

$result=mysqli_query($con,$qry);

?>