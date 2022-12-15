<?php

include("./server/connect.php");

if (isset($_GET['details_btn']) && isset($_GET['order_id'])) {
    $roder_status = $_GET['order_status'];
    $order_id = $_GET['order_id'];
    $order_details_qry = "SELECT * FROM order_items WHERE order_id='$order_id'";

    $order_details_result = mysqli_query($con, $order_details_qry);
} else {
    header('location:Account.php');
    exit;
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
            <?php while ($order_details = mysqli_fetch_array($order_details_result)) { ?>
                <tr class="bg-secondary ">
                    <td>
                        <img style="width:100px; height:100px;  object-fit: contain;" src="./assets/images/<?php echo $order_details['product_image']; ?>" alt="" srcset="">
                    </td>

                    <td>
                        <h6><?php echo $order_details['product_name'] ?></h6>
                    </td>

                    <td>
                        <h6><?php echo $order_details['product_price'] ?></h6>
                    </td>


                    <td>
                        <h6><?php echo $order_details['product_quantity'] ?></h6>
                    </td>

                </tr>

            <?php } ?>
        </table>

        <?php if ($roder_status == 'not paid') {  ?>
            <div class="pay-btn ">
            <form action="" method="post" >
                    <input type="submit" value="Pay Now" id='payNow_btn'  class="btn btn-primary mb-5">
                </form>
            </div>
               
           


        <?php } ?>



    </div>



    <footer class="mb-0" >
        <div class=" bg-primary p-3 text-light ">
            <p class="text-center ">@copyright 2022</p>
        </div>

    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>