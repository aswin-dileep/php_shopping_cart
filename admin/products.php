<?php include("header.php");

if (!isset($_SESSION['admin_logged_in'])) {
    header("location:admin_login.php");
}
if (isset($_POST['search_btn'])) {
    $search_key = $_POST['search_key'];
    $products_qry = "SELECT * FROM products WHERE product_id LIKE '%$search_key%' OR product_name LIKE '%$search_key%' OR product_price LIKE '$search_key%' 
    OR product_category LIKE '%$search_key%'";
} else {
    $products_qry = "SELECT * FROM products ";
}

$all_products = mysqli_query($con, $products_qry);
?>

<div class="row">
    <?php include("sidemenu.php") ?>
    <div class="col-md-10 bg-light">
        <h3>Admin</h3>
        <hr>
        <h3 class="">All Products</h3>
        <div class="text-center ">
            <form class="form-group" method="post" action="products.php">
                <div class="input-group w-50 mx-auto">
                    <input type="text" class="form-control" name="search_key" placeholder="Enter..">
                    <div class="input-group-append">
                        <input type="submit" class="btn btn-success" name="product_search_btn" value="Search">
                    </div>
                </div>
            </form>
        </div>
        <?php if (isset($_GET['edit_success_msg'])) { ?>
            <p class="text-success text-center mt-3"><?php echo $_GET['edit_success_msg'] ?></p>
        <?php } ?>
        <?php if (isset($_GET['product_add__msg'])) { ?>
            <p class="text-success text-center mt-3"><?php echo $_GET['product_add__msg'] ?></p>
        <?php } ?>

        <?php if (isset($_GET['edit_error_msg'])) { ?>
            <p class="text-danger text-center mt-3"><?php echo $_GET['edit_error_msg'] ?></p>
        <?php } ?>

        <table class="table mt-4 table-striped">
            <tr class="bg-primary">
                <th>Image</th>
                <th>Product Id </th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Color</th>
                <th>Quantity</th>
                <th>Edit </th>
                <th>Delete</th>
            </tr>
            <?php foreach ($all_products as $product) { ?>
                <tr class=" ">
                    <td> <img src="../assets/images/<?php echo $product['product_image1']; ?>" style="width: 100px;" alt="" srcset=""> </td>
                    <td><?php echo $product['product_id']; ?></td>
                    <td><?php echo $product['product_name']; ?></td>
                    <td><?php echo $product['product_price']; ?>/-</td>
                    <td><?php echo $product['product_category']; ?></td>
                    <td><?php echo $product['product_color']; ?></td>
                    <td><?php echo $product['product_quantity']; ?></td>
                    <td><a href="edit_product.php?product_id=<?php echo $product['product_id'] ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="delete_product.php?product_id=<?php echo $product['product_id']?>" class="btn btn-danger">Delete</a></td>

                </tr>
            <?php } ?>
        </table>
    </div>
</div>

</body>

</html>