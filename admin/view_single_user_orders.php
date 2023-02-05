<?php include("header.php") ;
if(isset($_GET['user_id'])){
$user_id =$_GET['user_id'];
$all_user_order_qry ="SELECT * FROM orders where user_id ='$user_id' ORDER BY order_id DESC ";
$users = mysqli_query($con,$all_user_order_qry);
?>
<div class="row">
    <?php include("sidemenu.php");?>

    <div class="col-md-10 bg-light" >
        <h3>Admin panel</h3>
        <hr>
        <h4 class="text-center">Orders </h4>

        <table class="table bg-primary table-striped text-center m-auto">
            <tr>
            <th>order_id</th>
            <th>Order_cost</th>
            <th>Order_status</th> 
            <th>User Address</th>
            <th>User City</th>
            <th>User Phone</th>
            <th>Order Date</th>
            <th>Details</th>
            <th>Edit</th>

           
            </tr>

            <?php foreach($users as $user) {?>
                <tr class="bg-light">
                    <td><?php echo $user['order_id']; ?></td>
                    <td><?php echo $user['order_cost']; ?></td>
                    <td><?php echo $user['order_status']; ?></td>
                    <td><?php echo $user['user_address']; ?></td>
                    <td><?php echo $user['user_city']; ?></td>
                    <td><?php echo $user['user_phone']; ?></td>
                    <td><?php echo $user['order_date']; ?></td>
                    <td><a class="btn btn-success" href="order_details.php?order_id=<?php echo $user['order_id']; ?>">Details</a></td>

                    <td><a class="btn btn-primary" href="edit_order.php?order_id=<?php echo $user['order_id']; ?>">Edit</a></td>
                </tr>
           <?php } ?>
        </table>
    </div>
</div>
<?php } include("footer.php"); ?>