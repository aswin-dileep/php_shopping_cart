<?php

session_start();




?>
  <?php include('./layout/header.php'); ?>
    <!-- payment -->
    <div class="container">
        <div class="col-md-4 m-auto text-center">
            <h2 class="mt-3">Payment</h2>
            <p class="mt-4"><?php if(isset($_GET['order_status'])){ echo $_GET['order_status']; }?></p>
            <p class="mt-4">Total payment :<?php if(isset($_SESSION['total'])){ echo $_SESSION['total']; }?></p>
            <?php if(isset($_SESSION['total']) && $_SESSION['total']!=0){  ?>
                <input type="submit" value="Pay Now" class="btn btn-primary mt-3">
                <?php } else { ?>
                  <p>You don't have an order</p>
                    <?php } ?>
            <?php if(isset($_GET['order_status']) && isset($_GET['orrder_status'])=="not paid"){ ?>
            <input type="submit" value="Pay Now" class="btn btn-primary mt-3">
            <?php } ?>
        </div>
    </div>


</body>


</div>
<!-- <footer class="mb-0">
    <div class=" bg-primary p-3 text-light ">
        <p class="text-center ">@copyright 2022</p>
    </div>

</footer> -->

<?php include("./layout/footer.php"); ?>