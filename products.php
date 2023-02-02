<?php
include("./server/connect.php");
session_start();

if (isset($_POST['filter_search'])) {

    $price = $_POST['price'];

    if (isset($_POST['Category'])) {
        $category = $_POST['Category'];

        $all_products_qry = "SELECT * FROM products WHERE product_category='$category' AND product_price<='$price'";
        $all_products_result = mysqli_query($con, $all_products_qry);
    } else {
        $all_products_qry = "SELECT * FROM products WHERE  product_price<='$price'";

        $all_products_result = mysqli_query($con, $all_products_qry);
    }
} else {
    $all_products_qry = "SELECT * FROM products";
    $all_products_result = mysqli_query($con, $all_products_qry);
}

if (isset($_POST['nav_search'])) {
    $search_data = mysqli_real_escape_string($con, $_POST['search_data']);
    $all_products_qry = "SELECT * FROM products WHERE search_keyword LIKE '%$search_data%' OR product_description LIKE '%$search_data%' OR product_category LIKE '%$search_data%' OR product_name LIKE '%$search_data%' ";
    $all_products_result = mysqli_query($con, $all_products_qry);
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

<body class="bg-light">
    <!-- main navbar section -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3 ">
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
                    <a class="nav-link" href="cart.php">Cart<i class="fa-sharp fa-solid fa-cart-shopping"><sup class="text-danger"><b><?php if (isset($_SESSION['total_quantity']) && $_SESSION['total_quantity'] != 0) {
                                                                                                                                            echo $_SESSION['total_quantity'];
                                                                                                                                        } ?> </b></sup></i> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Account.php">Account<i class="fa-solid fa-user"></i></a>
                </li>

            </ul>

            <form action="./products.php" class="form-group d-flex" method="post">
                <input type="text" class="form-control" placeholder="Search" name="search_data">
                <input type="submit" name="nav_search" value="Search" class="btn btn-success">
            </form>




        </div>

    </nav>

    <div class=" mx-5 mt-5 ">

        <div class="row">
            <h3 class="text-center mb-4">Our Products</h3>
            <div class="col-md-2 ">
                <h4 class="text-center">Search products</h4>

                <h5 class=" mt-5">Category</h5>
                <form action="./products.php" method="POST">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Category" value="Casual bags" <?php if (isset($category) && $category == 'Casual bags') {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Causal Bags
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Category" value="Travel bags" <?php if (isset($category) && $category == 'Travel bags') {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Travel bags
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Category" value="Handbags" <?php if (isset($category) && $category == 'Handbags') {
                                                                                                            echo 'checked';
                                                                                                        } ?>>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Handbags
                        </label>
                    </div>

                    <h5 class=" mt-5">Price</h5>
                    <input type="range" class="form-range " name="price" value="<?php if (isset($price)) {
                                                                                    echo $price;
                                                                                } ?>" min="100" max="10000" id="customRange1">
                    <div class="">
                        <span style="float: left;">100</span>
                        <span style="float: right;">10000</span>
                    </div>
                    <div class="w-50 ">
                        <input type="submit" value="search" name="filter_search" class="form-control mt-3 btn btn-primary">

                    </div>
                </form>
            </div>
            <div class="col-md-10">
                <div class="row">

                    <?php while ($all_products = mysqli_fetch_array($all_products_result)) { ?>
                        <div class='col-md-3 '>
                            <div class='card' style='width: 18rem;'>
                                <img class='card-img-top' src='./assets/images/<?php echo $all_products['product_image1'] ?>' alt='Card image cap'>
                                <div class='card-body'>
                                    <h5 class='card-title'><?php echo $all_products['product_name'] ?></h5>
                                    <p class='card-text text-center'><?php echo $all_products['product_price'] ?></p>
                                    <a href='single-product.php?product_id=<?php echo $all_products['product_id'] ?>' class='btn btn-primary'>Buy now</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?> 

                </div>
            </div>
        </div>


    </div>

    <footer class="mb-0 mt-5">
        <div class=" bg-primary p-3 text-light ">
            <p class="text-center ">@copyright 2022</p>
        </div>

    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>