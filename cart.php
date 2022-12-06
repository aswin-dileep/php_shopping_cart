<?php
session_start();
if (isset($_POST['add-to-cart'])) {
    // if the user already have added product to the cart
    if (isset($_SESSION['cart'])) {

        $product_array_ids = array_column($_SESSION['cart'], "product_id");

        if (!in_array($_POST['product_id'], $product_array_ids)) {

            $product_id = $_POST['product_id'];

            $product_array = array(
                'product_id' => $_POST['product_id'],
                'product_name' => $_POST['product_name'],
                'product_price' => $_POST['product_price'],
                'product_image' => $_POST['product_image'],
                'product_quantity' => $_POST['product_quantity']
            );

            $_SESSION['cart'][$product_id] = $product_array;

            //product has already been added 
        } else {
            echo "<script>alert('This product was already been added ');</script>";
        }

        // if this is the first product 
    } else {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];

        $product_array = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_image' => $product_image,
            'product_quantity' => $product_quantity
        );
        $_SESSION['cart'][$product_id] = $product_array;
    }

    //calculate total
    CartTotal();


    //remove form cart
} elseif (isset($_POST['remove_product'])) {

    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);
} elseif (isset($_POST['edit_quantity'])) {

    // we get id and quantity form the form
    $product_id = $_POST['product_id'];
    
    $product_quantity = $_POST['product_quantity'];
    // get the product array form the session
    $product_array = $_SESSION['cart'][$product_id];
    // update the product array
    $product_array['product_quantity'] = $product_quantity;
    //return array back to its place
    $_SESSION['cart'][$product_id] = $product_array;
} else {
}


function CartTotal()
{

    $total = 0;

    foreach ($_SESSION['cart'] as $key => $value) {
        $price = $value['product_price'];
        $quantity = $value['product_quantity'];
        $total = $total + ($price * $quantity);
    }

    return $total;
}
$_SESSION['total'] = CartTotal();
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
                        <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
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



    <div class="container">
        <h3 class="mt-5">Your Cart</h3>

        <table class="table mt-5 ">
            <tr class="bg-primary">
                <th>Product</th>
                <th>Quantity</th>
                <th>SubTotal</th>
            </tr>
            <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                <tr class="bg-secondary ">
                    <td>
                        <div class="product-info">
                            <img src="./assets/images/<?php echo $value['product_image'] ?>" style="width:50%; height:100px; object-fit:contain;" alt="" srcset="">
                        </div>
                        <div>
                            <p><?php echo $value['product_name'] ?></p>
                            <small><?php echo $value['product_price'] ?>/-</small><br>
                            <form action="cart.php" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $value['product_id'] ?>">
                                <input type="submit" name="remove_product" class="btn btn-success" value="Remove">
                            </form>

                        </div>
                    </td>
                    <td>

                        <form action="" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $value['product_id'] ?>">
                            <input type="number" name="product_quantity" value="<?php echo $value['product_quantity'] ?>">
                            <input type="submit" value="Edit" class="btn btn-success m-1" name="edit_quantity">
                        </form>

                    </td>
                    <td>
                        <span><?php echo $value['product_price'] * $value['product_quantity'] ?>/-</span>
                    </td>
                </tr>
            <?php } ?>
        </table>


        <table class="table bg-secondary ">
            <tr>
                <td>
                    <p>Total</p>
                </td>
                <td>
                    <p class="text-center text-light"> <?php echo $_SESSION['total']; ?>/-</p>
                </td>
            </tr>

        </table>
        <form action="checkout.php" method="post">
            <input type="submit" value="Checkout" name="checkout" class="btn btn-primary mb-5">
        </form>
    </div>



    <footer class="mb-0">
        <div class=" bg-primary p-3 text-light ">
            <p class="text-center ">@copyright 2022</p>
        </div>

    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>