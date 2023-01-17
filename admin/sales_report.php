<?php include("header.php");

if (!isset($_SESSION['admin_logged_in'])) {
    header("location:admin_login.php");
}

?>

<?php
if (isset($_POST['sales_search'])) {

    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $qry = "SELECT * FROM orders WHERE order_date >='$start_date' AND order_date<='$end_date' ";
    $result = mysqli_query($con, $qry);
}
?>


<div class="row">
    <?php include("sidemenu.php") ?>
    <div class="col-md-10 bg-light ">
        <h3>Admin</h3>
        <hr>
        <h3 class="text-center">Sales Report</h3>
        <div class="text-center ">
            <form class="form-group" method="post">
                <div class="input-group  ">
                    <div class="row m-auto">
                        <div class="col-md-6">
                            <label for="">Starting date</label> <br>
                            <input type="date" class="form-control " name="start_date">
                        </div>
                        <div class="col-md-6">
                            <label for="">Ending date</label>
                            <input type="date" class="form-control " name="end_date">

                        </div>
                        <div class="input-group-append">
                            <input type="submit" class="btn btn-success mt-3" name="sales_search" value="Search">
                        </div>
                        <?php if (isset($result)) { ?>
                            <a href="#total" style="text-decoration: none;" class="">show Total amount</a>
                            <table class="table table-striped mt-4 ">
                            

                                <tr class="bg-primary">
                                    <th>Order ID</th>
                                    <th>Order Cost</th>
                                    <th>Order Status</th>
                                    <th>User Id</th>
                                    <th>Order Date</th>
                                </tr>



                                <?php
                                $_SESSION['totalAmount'] = 0;
                                while ($order = mysqli_fetch_array($result)) { ?>
                                    <tr>
                                        <td><?php echo $order['order_id']; ?></td>
                                        <td><?php echo $order['order_cost']; ?></td>
                                        <td><?php echo $order['order_status']; ?></td>
                                        <td><?php echo $order['user_id']; ?></td>
                                        <td><?php echo $order['order_date']; ?></td>
                                    </tr>
                                    <?php $_SESSION['totalAmount'] = $_SESSION['totalAmount'] + $order['order_cost']; ?>
                                   
                                <?php }


                                ?>
                                 <tr>
                                        <th id="total">Total Amount:</th>
                                        <th> <?php if (isset($_SESSION['totalAmount'])) {

                                                    echo $_SESSION['totalAmount'] . '/-';
                                                } ?> </th>

                                    </tr>




                            <?php } ?>
                            </table>
                    </div>


                </div>
            </form>
        </div>

    </div>