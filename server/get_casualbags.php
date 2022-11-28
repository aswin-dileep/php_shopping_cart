<?php 
include('connect.php');

$qry ="select * from products Where product_category='Casual bags' limit 4";

$result=mysqli_query($con,$qry);

?>