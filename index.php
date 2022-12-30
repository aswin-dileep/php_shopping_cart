<?php include("./layout/header.php");

?>

    <div class="nabbar nav-expant-lg bg-secondary p-2">
        
      <a href="login.php" class="btn btn-success"><?php if(isset($_SESSION['logged_in'])){echo"logout"; }else{
        echo "login";
      } ?></a> 
    </div>
    <img src="./assets/images/homepage1.webp" style="width: 100%; object-fit:contain;" alt="" srcset="">
    <div class=" mx-5 mt-5 ">

        <div class="row">
            <h3 class="text-center">Our Products</h3>
            <?php
            include("./server/get_products.php");

            while ($row = mysqli_fetch_array($result)) { ?>
                <div class='col-md-3 '>
                    <div class='card' style='width: 18rem;'>
                        <img class='card-img-top' src='./assets/images/<?php echo $row['product_image1'] ?>' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'><?php echo $row['product_name'] ?></h5>
                            <p class='card-text text-center'><?php echo $row['product_price'] ?></p>
                            <a href='single-product.php?product_id=<?php echo $row['product_id'] ?>' class='btn btn-primary'>Buy now</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        
    </div>
    <div class=" mx-5 mt-5 ">

        <div class="row">
            <h3 class="text-center">Causal bags</h3>
            <?php
            include("./server/get_casualbags.php");

            while ($row = mysqli_fetch_array($result)) { ?>
                <div class='col-md-3 '>
                    <div class='card' style='width: 18rem;'>
                        <img class='card-img-top' src='./assets/images/<?php echo $row['product_image1'] ?>' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'><?php echo $row['product_name'] ?></h5>
                            <p class='card-text text-center'><?php echo $row['product_price'] ?></p>
                            <a href='single-product.php?product_id=<?php echo $row['product_id'] ?>' class='btn btn-primary'>Buy now</a>
                        </div>
                    </div>
                </div>
            <?php } ?>





        </div>
    </div>

    <div class=" mx-5 mt-5 ">

        <div class="row">
            <h3 class="text-center">Travel bags</h3>
            <?php
            include("./server/get_travelbags.php");

            while ($row = mysqli_fetch_array($result)) { ?>
                <div class='col-md-3 '>
                    <div class='card' style='width: 18rem;'>
                        <img class='card-img-top' src='./assets/images/<?php echo $row['product_image1'] ?>' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'><?php echo $row['product_name'] ?></h5>
                            <p class='card-text text-center'><?php echo $row['product_price'] ?></p>
                            <a href='single-product.php?product_id=<?php echo $row['product_id'] ?>' class='btn btn-primary'>Buy now</a>
                        </div>
                    </div>
                </div>
            <?php } ?>





        </div>
    </div>

    <div class=" mx-5 mt-5 ">

        <div class="row">
            <h3 class="text-center">Handbags</h3>
            <?php
            include("./server/get_handbags.php");

            while ($row = mysqli_fetch_array($result)) { ?>
                <div class='col-md-3 '>
                    <div class='card' style='width: 18rem;'>
                        <img class='card-img-top' src='./assets/images/<?php echo $row['product_image1'] ?>' alt='Card image cap'>
                        <div class='card-body'>
                            <h5 class='card-title'><?php echo $row['product_name'] ?></h5>
                            <p class='card-text text-center'><?php echo $row['product_price'] ?>/-</p>
                            <a href='single-product.php?product_id=<?php echo $row['product_id'] ?>' class='btn btn-primary'>Buy now</a>
                        </div>
                    </div>
                </div>
            <?php } ?>





        </div>
    </div>



<?php include("./layout/footer.php") ?>