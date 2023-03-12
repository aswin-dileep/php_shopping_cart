<?php
 include("./server/connect.php");
 include("./layout/header.php"); 

if (!empty($_SESSION['cart'])) {
} else {
    echo "<script>alert('The cart is empty')</script>";
    header("location:index.php");
}

if(isset($_POST['default_address'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $address_id = $_POST['address_id'];
}else{
    header("Account.php");
}
?>





<!-- checkout section -->
<div class="container">
    <div class="row ">
        <h3 class="text-center mt-5">Checkout Page</h3>
        <form action="./server/place_order.php" class="form-group" method="post">
            <p class="text-center text-danger"><?php if (isset($_GET['message'])) {
                                                    echo $_GET['message'];
                                                    echo ' <a href="login.php" class="btn btn-primary">Login</a>';
                                                } ?></p>
            <div class="col-md-6 m-auto">

                <label for="">Name</label>
                <label for="" class="form-control"> <?php echo $name ?></label>
                <label for="">Phone</label>
                <label for="" class="form-control"> <?php echo $phone ?></label>
                <input type="hidden" name="address_id" value="<?php echo $address_id ?>">
                <label for="">Email</label>
                <label for="" class="form-control"> <?php echo $email ?></label>
                <label for="">City</label>
                <label for="" class="form-control"> <?php echo $city ?></label>
                <label for="">Address</label>
                <label for="" class="form-control"> <?php echo $address ?></label>
                <p class="mt-2"> Total Amount is <?php echo $_SESSION['total']; ?>/-</p>
                <input type="submit" name="place_order" value="Place Order" class="btn btn-success mt-1 mb-3">
            </div>

        </form>
    </div>
</div>



</body>


</div>


<?php include("./layout/footer.php"); ?>