<?php 
include("./server/connect.php");
 if(isset($_GET['product_id'])){
    $product_id=$_GET['product_id'];
    $qry="select * from products where product_id=$product_id";
    
    $result = mysqli_query($con,$qry);

 }else{
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/styles.css">

</head>

<body class="bg-light">
    <!-- main navbar section -->

    <nav class="navbar navbar-expand-lg navbar-light bg-primary py-3 ">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">Shopping site</a>


            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.html">Products</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Travel</a></li>
                            <li><a class="dropdown-item" href="#">Casual</a></li>
                            <li><a class="dropdown-item" href="#">Laptop</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" data-bs-toggle="dropdown">
                            Brands
                            <ul class="dropdown-menu">
                                <li><a href="" class="dropdown-item">Nike</a></li>
                                <li><a href="" class="dropdown-item">Puma</a></li>
                                <li><a href="" class="dropdown-item">Addidas</a></li>
                            </ul>
                        </button>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.html">Cart<i class="fa-sharp fa-solid fa-cart-shopping"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Account.html">Account<i class="fa-solid fa-user"></i></a>
                </li>

            </ul>




        </div>

    </nav>
    <?php while($row=mysqli_fetch_array($result)) {?>
       
    <div class="row mt-5">
    
        <div class="col-md-6 ">
            <img src="./assets/images/<?php echo $row['product_image1'];?>" class="img-fluid w-100 "style='height: 300px; object-fit:contain;' alt="" srcset="">
        </div> 
    
        <div class="col-md-6">
            <h3 class="text-center"><?php echo $row['product_name'] ?></h3>
            <p class="mt-5">Price: <?php echo $row['product_price'] ?>/-</p>
            <form action="cart.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $row['product_image1'];?>">
            <input type="hidden" name="product_name" value="<?php echo $row['product_name'];?>">
            <input type="hidden" name="product_price" value="<?php echo $row['product_price'];?>">
            <input type="number" name="product_quantity" value="1">
            <button class="btn btn-primary " type="submit" name="add-to-cart">Add to Cart</button>
            </form>
        </div>
       
    </div>
   
    <div class="row">
        <div class="col-md-6 mt-5">
            <img src="./assets/images/<?php echo $row['product_image2'] ?>" class="img-fluid w-100 "style='height: 300px; object-fit:contain;' alt="" srcset="">
        </div> 
    <div class="col-md-6">
        <h4 class="mt-5 mb-5">Product Details</h4>
        <span><?php echo $row['product_description'] ?></span>
    </div>

    </div>
   
 <?php } ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>