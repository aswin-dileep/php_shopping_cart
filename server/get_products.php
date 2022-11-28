<?php 
include('connect.php');

$qry ="select * from products limit 10";

$result=mysqli_query($con,$qry);

?>