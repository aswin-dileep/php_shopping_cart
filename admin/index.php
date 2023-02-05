<?php include("header.php");

if (!isset($_SESSION['admin_logged_in'])) {
    header("location:admin_login.php");
}
if(isset($_POST['search_btn'])){
    $search_key =$_POST['search_key'];
    $orders_qry ="SELECT * FROM orders WHERE order_id LIKE '%$search_key%' OR order_status LIKE '$search_key%' ";
}else{
    $order_per_page = 7;
    $total_order_qry = "SELECT * FROM orders";
    $total_order_result = mysqli_query($con,$total_order_qry);
    $total_orders = mysqli_num_rows($total_order_result);
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $no_of_pages = ceil($total_orders/$order_per_page);
    $starting_page = ($page-1)*$order_per_page;

    $orders_qry = "SELECT * FROM orders ORDER BY order_id DESC LIMIT $starting_page,$order_per_page ";
    
   
}

$all_orders = mysqli_query($con, $orders_qry);
?>

<div class="row">
    <?php include("sidemenu.php") ?>
    <div class="col-md-10 bg-light" style="height:100vh;">
        <h3>Admin</h3>
        <hr>
        <h3 class="">All Orders</h3>
      <div class="text-center">
      <form class="form-group" method="post" action="index.php">
            <div class="input-group w-50 ">
                <input type="text" class="form-control" name="search_key" placeholder="Enter Order Id or Order Status">
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
                <th>Details</th>
                <th>Edit </th>
                
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
                    <td><a href="order_details.php?order_id=<?php echo $orders['order_id']; ?>" class="btn btn-success">Details</a></td>
                    <td><a href="edit_order.php?order_id=<?php echo $orders['order_id'] ?>" class="btn btn-primary">Edit</a></td>
                   

                </tr>
            <?php } ?>
        </table>
        <?php if(!isset($_POST['search_btn'])) { ?>
        <nav >
            <ul class="pagination">
                <li class="page-item  <?php if($page==1){echo 'disabled';} ?> ">
                <a href="<?php if($page==1){echo'#';}else{ echo"?page=".$page-1;}?>" class="page-link">Previous</a>
             </li>


             <li class="page-item"><a class="page-link <?php if($page==1){echo "active";} ?>" href="?page=1">1</a></li>
             <li class="page-item"><a class="page-link <?php if($page==2){echo "active";} ?>" href="?page=2">2</a></li>

             <?php if($page>=3) {?>
                <li class="page-item"><a class="page-link" href="">....</a></li>
                <li class="page-item">
                    <a class="page-link active" href="?page=<?php echo $page ?>"><?php echo $page ?></a>
                </li>
                <?php }?>

                <li class="page-item  <?php if($page>=$no_of_pages){echo 'disabled';} ?>">
                <a class="page-link" href="<?php if($page==$no_of_pages){echo'#';}else{ echo"?page=".$page+1;}?>">Next</a>
             </li>

            </ul>
        </nav>
        <?php }?>
    </div>
</div>
