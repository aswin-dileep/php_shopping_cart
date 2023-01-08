<?php include("header.php");
  
  if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $edit_order_qry ="SELECT * FROM orders where order_id='$order_id' ";
    $order_result = mysqli_query($con,$edit_order_qry);

  }elseif(isset($_POST['edit_order_btn'])){

    $order_status = $_POST['order_status'];
    $order_id = $_POST['order_id'];
    $edit_qry ="UPDATE orders SET order_status='$order_status' WHERE order_id ='$order_id' ";
    $edit = mysqli_query($con,$edit_qry);

    if(!$edit){
        header("location:index.php?edit_order_error=Error...The order status is not edited");
    }else{
         header("location:index.php?edit_order_success=THe order status is Successfully edited");
    }
    
  }else{
    header("location:index.php");
  }
  


?>

<div class="row">
    
     <?php include("sidemenu.php"); ?>
    
    <div class="col-md-10 bg-light">
      <h2>Admin Panel</h2>
      <hr>
      <h3>Edit Order</h3>
      <?php while($order = mysqli_fetch_array($order_result) ) { ?>
      <h5 class="mt-5">Order Id</h5>
      <p><?php echo $order['order_id']; ?></p>
      <h5>Order Price</h5>
      <p><?php echo $order['order_cost'] ?>  /-</p>

      <form action="edit_order.php" class="form-group w-50" method="post">
        <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
        <h5>Order Status</h5>
        <select class="form-select w-50 " name="order_status" id="">
            <option value="<?php echo $order['order_status'] ?>"><?php echo $order['order_status']; ?> </option>
            <option value="not paid">not paid </option>
            <option value="paid">paid</option>
            <option value="On the way">On the way</option>
            <option value="Delivered">Deliverd </option>
        </select>
        <h5 class="mt-3">Order date</h5>
          <p><?php echo $order['order_date'] ?> </p>
          <input type="submit" name="edit_order_btn" value="Edit" class="btn btn-primary">
      </form>

      <?php } ?>
    </div>
</div>