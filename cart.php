<?php
include("./layout/header.php");

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

    // we get id and quantity from the form
    $product_id = $_POST['product_id'];

    $product_quantity = $_POST['product_quantity'];
    // get the product array from the session
    $product_array = $_SESSION['cart'][$product_id];
    // update the product array
    $product_array['product_quantity'] = $product_quantity;
    //return array back to its place
    $_SESSION['cart'][$product_id] = $product_array;
} elseif(empty($_SESSION['cart'])) {
    
     echo '<script>alert("The Cart is empty... Please add some products to the Cart.....")</script>';
     
    // header("refresh:0;url=products.php");
    
}



function CartTotal()
{
    $total = 0;
    $total_quantity =0;
       if(isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        $price = $value['product_price'];
        $quantity = $value['product_quantity'];
        $total = $total + ($price * $quantity);
        $total_quantity += $quantity;
    }
}
    $_SESSION['total_quantity']=$total_quantity;
    return $total;
    
}
$_SESSION['total'] = CartTotal();
?>



<!-- main navbar section -->





<div class="container">
    <h3 class="mt-5">Your Cart</h3>

    <table class="table mt-5 ">
        <tr class="bg-primary">
            <th>Product</th>
            <th>Quantity</th>
            <th>SubTotal</th>
        </tr>
           <?php if(isset($_SESSION['cart'])) {?>
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
    <?php if(isset($_SESSION['cart']) ) {?>
    <form action="checkout.php" method="post">
        <input type="submit" value="Checkout" name="checkout" class="btn btn-primary mb-5">
    </form>
    <?php }?>
</div>





