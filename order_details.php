<?php

include("./server/connect.php");

if (isset($_GET['details_btn']) && isset($_GET['order_id'])) {
    $order_status = $_GET['order_status'];
    $order_id = $_GET['order_id'];
    $order_details_qry = "SELECT products.product_image1,products.product_name,products.product_price,order_items.item_quantity
     FROM products INNER JOIN order_items on order_items.order_id ='$order_id' Where order_items.product_id=products.product_id ";

    //select product_id form order_items where order_id='$order_id'
    $order_details_result = mysqli_query($con, $order_details_qry);
    $totalOrder = OrderTotal($order_details_result);
} else {
    header('location:Account.php');
    exit;
}

function OrderTotal($order_details_result)
{
    $total = 0;

    foreach ($order_details_result as $order_details) {
        $order_price = $order_details['product_price'];
        $order_quantity = $order_details['item_quantity'];

        $total = $total + ($order_price * $order_quantity);
    }
    return $total;
}


?>


<?php include("./layout/header.php"); ?>


<!-- Order details -->
<div id="orders" class="container">
    <h3 class="mt-5">Order details</h3>

    <table class="table mt-5 text-center ">
        <tr class="bg-primary">
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        <?php foreach ($order_details_result as $order_details) { ?>
            <tr class="bg-secondary ">
                <td>
                    <img style="width:100px; height:100px;  object-fit: contain;" src="./assets/images/<?php echo $order_details['product_image1']; ?>" alt="" srcset="">
                </td>

                <td>
                    <h6><?php echo $order_details['product_name'] ?></h6>
                </td>

                <td>
                    <h6><?php echo $order_details['product_price'] ?></h6>
                </td>


                <td>
                    <h6><?php echo $order_details['item_quantity'] ?></h6>
                </td>

            </tr>

        <?php } ?>
    </table>

    <?php if ($order_status == 'not paid') {  ?>
        <div class="pay-btn ">
            <form action="payment.php" method="post">
                <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
                <input type="hidden" name="total_order" value="<?php echo $totalOrder ?>">
                <input type="hidden" name="order_status" value="<?php echo $order_status ?>">
                <input type="submit" value="Pay Now" name="Pay_btn" id='payNow_btn' class="btn btn-primary mb-5">

            </form>
        </div>




    <?php } ?>



</div>


<?php  include("./layout/footer.php");