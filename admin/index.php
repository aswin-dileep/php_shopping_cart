<?php include("header.php") ;

if(!isset($_SESSION['admin_logged_in'])){
    header("location:admin_login.php");
}

$orders_qry="SELECT * FROM orders";
$all_orders = mysqli_query($con,$orders_qry);
?>
  
    <div class="row">
       <?php include("sidemenu.php") ?>
        <div class="col-md-10 bg-light">
            <h3>Admin</h3>
            <hr>
            <h3 class="">Section Title</h3>

            <table class="table mt-4 table-striped">
                <tr class="bg-primary">
                    <th>Order Id</th>
                    <th>Order Status </th>
                    <th>User Id</th>
                    <th>User Phone</th>
                    <th>User Address</th>
                    <th>Order Date </th>
                    <th>Edit </th>
                    <th>Delete</th>
                </tr>
                <?php foreach($all_orders as $orders) {?>
                <tr class=" ">
                    <td><?php echo $orders['order_id']; ?></td>
                    <td><?php echo $orders['order_status']; ?></td>
                    <td><?php echo $orders['user_id']; ?></td>
                    <td><?php echo $orders['user_phone']; ?></td>
                    <td><?php echo $orders['user_address']; ?></td>
                    <td><?php echo $orders['order_date']; ?></td>
                    <td><a href="" class="btn btn-primary">Edit</a></td>
                    <td><a href="" class="btn btn-danger">Delete</a></td>

                </tr>
               <?php }?>
            </table>
        </div>
    </div>

</body>

</html>