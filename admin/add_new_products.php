<?php include('header.php'); 
if(!isset($_SESSION['admin_logged_in'])){
    header("location:login.php");
}
if(isset($_POST['add_product_btn'])){
    
    $product_name = mysqli_real_escape_string($con, $_POST['product_name']);
    $product_description =  mysqli_real_escape_string($con,$_POST['product_description']);
    $product_price = $_POST['product_price'];
    $product_quantity =$_POST['product_quantity'];
    $product_category = $_POST['product_category'];
    $search_keyword = mysqli_real_escape_string($con,$_POST['search_keyword']);
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    
    $image1_temp_location = $_FILES['product_image1']['tmp_name'];
    $image2_temp_location =$_FILES['product_image2']['tmp_name'];
    $image1_destination ="../assets/images/".$product_image1;
    $image2_destination ="../assets/images/".$product_image2;
    move_uploaded_file($image1_temp_location,$image1_destination);
    move_uploaded_file($image1_temp_location,$image2_destination);
  
    $insert_product_qry = "INSERT INTO products (product_name,product_description,product_price,product_quantity,
    product_category,search_keyword,product_image1,product_image2) VALUES('$product_name','$product_description','$product_price'
    ,'$product_quantity','$product_category','$search_keyword','$product_image1','$product_image2')";

    $add_product= mysqli_query($con,$insert_product_qry);

    if(!$add_product){
       echo "<script>alert('Error product is not added ')</script>";
    }else{
       // header("location:products.php?add_product_msg=product added successfully");
    }

}

?>
<div class="row">
    <?php include("./sidemenu.php"); ?>
    <div class="col-md-10 bg-light">
        <h2>Admin Panel</h2>
        <hr>
        <h3 class="text-center">Add New Product</h3>
        <div class="w-50 m-auto">
            <form action="add_new_products.php" method="post" enctype="multipart/form-data"  class="form-group ">

                    <label for="">Title</label>
                    <input type="text" class="form-control" name="product_name" required>

                    <label for="">Description</label>
                    <textarea name="product_description" id="" class="form-control" cols="30" rows="10" required> </textarea>

                    <label for="">Search Keywords</label>
                    <textarea name="search_keyword" id="" class="form-control" cols="30" rows="10" required> </textarea>

                    <label for="">Price</label>
                    <input type="text" name="product_price"  class="form-control" required>

                    <label for="">Quantity</label>
                    <input type="text" name="product_quantity" class="form-control" required>

                    <label for="">Category</label>
                    <select name="product_category" id="" class="form-select w-50" >
                        <option  > Select </option>
                        <option value="casual bags">Casual Bags</option>
                        <option value="Travel bags">Travel Bags</option>
                        <option value="Handbags">Hand Bags</option>
                    </select>

                    <label for="">Image 1</label>
                    <input type="file" name="product_image1"  class="form-control" required >

                    <label for="">Image 2</label>
                    <input type="file" name="product_image2"  class="form-control" required>
                   
                    <input type="submit" name="add_product_btn" class="btn btn-primary mt-3 mb-3 " value="Add Product">
                
            </form>
        </div>

    </div>
</div>





<?php include('footer.php'); ?>