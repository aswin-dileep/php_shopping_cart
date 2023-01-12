<?php include("header.php"); ?>
<?php 
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
        $order_details_qry ="SELECT products.product_id, products.product_image1,products.product_name,products.product_price,order_items.product_quantity
        FROM products INNER JOIN order_items on order_items.order_id ='$order_id' WHERE order_items.product_id=products.product_id ";
   
    
        $order_details = mysqli_query($con,$order_details_qry);
    }
?>
<div class="row">
    <?php include("sidemenu.php"); ?>
    <div class="col-md-10 bg-light">
        <h3>Admin Panel</h3>
        <hr>
        <h4 class="text-center">Order details</h4>
        <table class="table bg-primary table-striped">
            <tr>
           
            <th>Product id</th>
            <th>Name</th>
            <th>Image</th>
            <th>Quantity</th>
            <th>Price</th>
            </tr>
            
            <?php while($order = mysqli_fetch_array($order_details)) { ?>
                <tr class="bg-light">
                
                <td><?php echo $order['product_id']; ?></td>
                <td><?php echo $order['product_name']; ?></td>
                <td> <img src="../assets/images/<?php echo $order['product_image1']; ?>" alt="" style="width:100px" srcset=""> </td>
                <td><?php echo $order['product_quantity']; ?></td>
                <td><?php echo $order['product_price']; ?></td>
                </tr>
            <?php } ?>
           
        </table>




    </div>
</div>