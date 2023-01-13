<?php
include("./server/connect.php");
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $qry = "SELECT * FROM products WHERE product_id=$product_id";

    $result = mysqli_query($con, $qry);
} else {
    header("location:index.php");
}


?>

<?php include("./layout/header.php") ?>
<?php while ($row = mysqli_fetch_array($result)) { ?>

    <div class="row mt-5">

        <div class="col-md-6 ">
            <img src="./assets/images/<?php echo $row['product_image1']; ?>" class="img-fluid w-100 " style='height: 300px; object-fit:contain;' alt="" srcset="">
        </div>

        <div class="col-md-6">
            <h3 class="text-center"><?php echo $row['product_name'] ?></h3>
            <p class="mt-5">Price: <?php echo $row['product_price'] ?>/-</p>
            <form action="cart.php" method="post">

                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $row['product_image1']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
                <input type="number" name="product_quantity" value="1">
                
                <?php if ($row['product_quantity'] < 1) { ?>
                    <p class="text-danger">Out of Stock</p>
                <?php } elseif ($row['product_quantity'] < 10) { ?>
                    <p class="text-danger">Only limited stocks left</p>
                    <button class="btn btn-primary " type="submit" name="add-to-cart">Add to Cart</button>
                <?php } else { ?>
                    <button class="btn btn-primary " type="submit" name="add-to-cart">Add to Cart</button>
                <?php } ?>
            </form>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6 mt-5">
            <img src="./assets/images/<?php echo $row['product_image2'] ?>" class="img-fluid w-100 " style='height: 300px; object-fit:contain;' alt="" srcset="">
        </div>
        <div class="col-md-6">
            <h4 class="mt-5 mb-5">Product Details</h4>
            <span><?php echo $row['product_description'] ?></span>
        </div>

    </div>

<?php } ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>