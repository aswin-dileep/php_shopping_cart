<?php include("header.php");

if (!isset($_SESSION['admin_logged_in'])) {
    header("location:admin_login.php");
}
if(isset($_POST['search_btn'])){
    $search_key =$_POST['search_key'];
    $orders_qry ="SELECT * FROM orders WHERE order_id LIKE '%$search_key%' OR user_city LIKE '%$search_key%' OR order_status LIKE '$search_key%' 
    OR user_id LIKE '%$search_key%' OR user_phone LIKE '%$search_key%' OR user_address LIKE '%$search_key%' OR order_date LIKE '%$search_key%' ";
}else{
    $orders_qry = "SELECT * FROM orders ORDER BY order_id DESC LIMIT 15 ";
}

$all_orders = mysqli_query($con, $orders_qry);
?>

<div class="row">
    <?php include("sidemenu.php") ?>
    <div class="col-md-10 bg-light">
        <h3>Admin</h3>
        <hr>
        <h3 class="">All Orders</h3>
      <div class="text-center">
      <form class="form-group" method="post" action="index.php">
            <div class="input-group w-50 ">
                <input type="text" class="form-control" name="search_key" placeholder="Enter..">
                <div class="input-group-append">
                    <input type="submit" class="btn btn-success" name="search_btn" value="Search">
                </div>
            </div>
        </form>
      </div>
        

        <table class="table mt-4 table-striped">
            <tr class="bg-primary">
                <th>Order Id</th>
                <th>Order Status </th>
                <th>User Id</th>
                <th>User Phone</th>
                <th>User Address</th>
                <th>User City</th>
                <th>Order Date </th>
                <th>Edit </th>
                <th>Delete</th>
            </tr>
            <?php foreach ($all_orders as $orders) { ?>
                <tr class=" ">
                    <td><?php echo $orders['order_id']; ?></td>
                    <td><?php echo $orders['order_status']; ?></td>
                    <td><?php echo $orders['user_id']; ?></td>
                    <td><?php echo $orders['user_phone']; ?></td>
                    <td><?php echo $orders['user_address']; ?></td>
                    <td><?php echo $orders['user_city']; ?></td>
                    <td><?php echo $orders['order_date']; ?></td>
                    <td><a href="edit_order.php?order_id=<?php echo $orders['order_id'] ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="" class="btn btn-danger">Delete</a></td>

                </tr>
            <?php } ?>
        </table>
    </div>
</div>
