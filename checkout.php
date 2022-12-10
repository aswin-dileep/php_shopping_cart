<?php

session_start();

if (!empty($_SESSION['cart']) && isset($_POST['checkout'])) {

} else {
    echo "<script>alert('The cart is empty')</script>";
    header("location:index.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/styles.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary py-3 ">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">Shopping site</a>


            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Products</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Cart<i class="fa-sharp fa-solid fa-cart-shopping"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Account.php">Account<i class="fa-solid fa-user"></i></a>
                </li>

            </ul>




        </div>

    </nav>

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



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>