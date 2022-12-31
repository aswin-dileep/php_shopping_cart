<?php
include("./server/connect.php");
include('./layout/header.php');

include('stripeConfig.php');

if(isset($_POST['total_order'])){
    $amount= $_POST['total_order']*100;
}else{
    $amount = $_SESSION['total']*100;
}

?>

<!-- payment -->
<div class="container">
    <div class="col-md-4 m-auto text-center">
        <h2 class="mt-3">Payment</h2>

        <?php if (isset($_POST['order_status']) && $_POST['order_status'] == "not paid") { ?>
            <?php $order_id=$_POST['order_id']; ?>
            <p>Total Payment : <?php echo $_POST['total_order'];  ?>/-</p>
            <form action="./server/complete_payment.php" method="post">
                <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key=<?php echo $public_key; ?> data-amount='<?php echo $_POST['total_order']*100 ?>' ; data-name="Bag Shop" data-description="Enter your card details" data-currency="inr">


                </script>
            </form>
            
        <?php } elseif (isset($_SESSION['total']) && $_SESSION['total'] != 0) { ?>
            <?php $order_id=$_SESSION['order_id'] ?>
            <p class="mt-4">Total payment :<?php if (isset($_SESSION['total'])) {
                                                echo $_SESSION['total'];
                                            } ?>/-</p>
            <form action="./server/complete_payment.php" method="post">
            <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key=<?php echo $public_key; ?> data-amount='<?php echo $_SESSION['total']*100 ?>' ; data-name="Bag Shop" data-description="Enter your card details" data-currency="inr">


                </script>
            </form>

       
        <?php } else { ?>
            <p>You don't have an order</p>
        <?php } ?>
    </div>
</div>


</body>


</div>

<?php include("./layout/footer.php"); ?>