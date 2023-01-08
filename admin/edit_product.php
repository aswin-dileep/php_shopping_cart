<?php
include("./header.php");
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $products_details_qry = "SELECT * FROM products WHERE product_id=$product_id";
    $products = mysqli_query($con, $products_details_qry);

}elseif (isset($_POST['edit_product_btn'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $product_color = $_POST['product_color'];

    $edit_qry = "UPDATE products SET product_name='$product_name', product_description='$product_description', product_price='$product_price', product_category='$product_category',product_color='$product_color'  WHERE product_id='$product_id'";
    
    if(mysqli_query($con, $edit_qry)){
        
        header("location:products.php?edit_success_msg=product successfully edited");
    }else{
        echo "<script>alert('Error')</script>";

        header("location:products.php?edit_error_msg=error product not edited ");
    }
    
   
} else {
    echo '<script>alerts("Error")</script>';

    header("refresh:0;url=products.php");
}




?>

<div class="row">
    <?php include("./sidemenu.php"); ?>
    <div class="col-md-10 bg-light">
        <h2>Admin Panel</h2>
        <hr>
        <h3 class="text-center">Edit Product</h3>
        <div class="w-50 m-auto">
            <form action="edit_product.php" method="post" class="form-group ">
                <?php foreach ($products as $product) { ?>
                    
                    <input type="hidden" class="form-control" name="product_id" value="<?php echo $product['product_id']; ?>">

                    <label for="">Title</label>
                    <input type="text" class="form-control" name="product_name" value="<?php echo $product['product_name']; ?>">

                    <label for="">Description</label>
                    <textarea name="product_description" id="" class="form-control" cols="30" rows="10"><?php echo $product['product_description']; ?></textarea>

                    <label for="">Price</label>
                    <input type="text" name="product_price" value="<?php echo $product['product_price']; ?>" class="form-control">

                    <label for="">Category</label>
                    <select name="product_category" id="" class="form-select w-50">
                        <option value="<?php echo $product['product_category']; ?>"> <?php echo $product['product_category']; ?> </option>
                        <option value="casual bags">Casual Bags</option>
                        <option value="Travel bags">Travel Bags</option>
                        <option value="Handbags">Hand Bags</option>
                    </select>

                    <label for="">Color</label>
                    <input type="text" name="product_color" class="form-control" value="<?php echo $product['product_color']; ?>">

                    <input type="submit" name="edit_product_btn" class="btn btn-primary mt-2" value="Edit">
                <?php } ?>
            </form>
        </div>

    </div>
</div>


















<?php include("footer.php"); ?>