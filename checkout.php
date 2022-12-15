<?php

session_start();

if (!empty($_SESSION['cart']) && isset($_POST['checkout'])) {

} else {
    echo "<script>alert('The cart is empty')</script>";
    header("location:index.php");
}


?>


<?php include("./layout/header.php"); ?>


    <!-- checkout section -->
    <div class="container">
        <div class="row ">
            <h3 class="text-center mt-5">Checkout Page</h3>
            <form action="./server/place_order.php" class="form-group" method="post" >
                <div class="col-md-6 m-auto">

                    <label for="">Name</label>
                    <input type="text" class="form-control" name="checkout-name">
                    <label for="">Phone</label>
                    <input type="text" class="form-control" name="checkout-phone">

                    <label for="">Email</label>
                    <input type="text" class="form-control" name="checkout-email">
                    <label for="">City</label>
                    <input type="text" class="form-control" name="checkout-city">
                    <label for="">Address</label>
                    <input class="form-control" name="checkout-address" name="Checkout-Address">
                    <p class="mt-2"> Total Amount is <?php echo $_SESSION['total']; ?>/-</p>
                    <input type="submit" name="place_order" value="Place Order" class="btn btn-success mt-1 mb-3">
                </div>

            </form>
        </div>
    </div>



</body>


</div>
<footer class="mb-0">
    <div class=" bg-primary p-3 text-light ">
        <p class="text-center ">@copyright 2022</p>
    </div>

</footer>

<?php include("./layout/footer.php"); ?>