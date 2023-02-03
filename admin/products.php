<?php include("header.php");

if (!isset($_SESSION['admin_logged_in'])) {
    header("location:admin_login.php");
}
if (isset($_POST['search_btn'])) {
    $search_key = $_POST['search_key'];
    $products_qry = "SELECT * FROM products WHERE product_id LIKE '%$search_key%' OR product_name LIKE '%$search_key%'";
} else {
    $products_per_page = 5;
    $total_product_qry = "SELECT * FROM products";
    $total_product_result = mysqli_query($con,$total_product_qry);
    $total_products = mysqli_num_rows($total_product_result);
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    $no_of_pages = ceil($total_products/$products_per_page);
    $starting_page = ($page-1)*$products_per_page;
    $products_qry = "SELECT * FROM products LIMIT $starting_page,$products_per_page";
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
                    <input type="text" class="form-control" name="search_key" placeholder="Enter Product Name or Product Id">
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
                   
                    <td><?php echo $product['product_quantity']; ?></td>
                    <td><a href="edit_product.php?product_id=<?php echo $product['product_id'] ?>" class="btn btn-primary">Edit</a></td>
                    <td><a href="delete_product.php?product_id=<?php echo $product['product_id']?>" class="btn btn-danger">Delete</a></td>

                </tr>
            <?php } ?>
        </table>
        <?php if(!isset($_POST['search_btn'])) { ?>
        <nav >
            <ul class="pagination">
                <li class="page-item  <?php if($page==1){echo 'disabled';} ?> ">
                <a href="<?php if($page==1){echo'#';}else{ echo"?page=".$page-1;}?>" class="page-link">Previous</a>
             </li>


             <li class="page-item"><a class="page-link <?php if($page==1){echo "active";} ?>" href="?page=1">1</a></li>
             <li class="page-item"><a class="page-link <?php if($page==2){echo "active";} ?>" href="?page=2">2</a></li>

             <?php if($page>=3) {?>
                <li class="page-item"><a class="page-link " href="">....</a></li>
                <li class="page-item">
                    <a class="page-link active" href="?page=<?php echo $page ?>"><?php echo $page ?></a>
                </li>
                <?php }?>

                <li class="page-item  <?php if($page>=$no_of_pages){echo 'disabled';} ?>">
                <a class="page-link" href="<?php if($page==$no_of_pages){echo'#';}else{ echo"?page=".$page+1;}?>">Next</a>
             </li>

            </ul>
        </nav>
        <?php } ?>
        
    </div>
</div>

</body>

</html>