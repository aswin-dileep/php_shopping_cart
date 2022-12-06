<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/styles.css">

</head>

<body class="bg-light">
    <!-- main navbar section -->

    <nav class="navbar navbar-expand-lg navbar-light bg-primary py-3 ">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">Shopping site</a>


            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Products</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Cart<i class="fa-sharp fa-solid fa-cart-shopping"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Account.php">Account<i class="fa-solid fa-user"></i></a>
                </li>

            </ul>




        </div>

    </nav>
     <div class="nabbar nav-expant-lg bg-secondary p-2">
        <button class="btn btn-success"> login</button>
     </div>
     <div class=" mx-5 mt-5 ">
       
       <div class="row">
           <h3 class="text-center">Our Products</h3>
           <?php
           include("./server/get_products.php");

           while ($row = mysqli_fetch_array($result)) { ?>
               <div class='col-md-3 '>
         <div class='card' style='width: 18rem;'>
             <img class='card-img-top' src='./assets/images/<?php echo$row['product_image1']?>' alt='Card image cap'>
             <div class='card-body'>
                 <h5 class='card-title'><?php echo$row['product_name']?></h5>
                 <p class='card-text text-center'><?php echo$row['product_price']?></p>
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
              <img class='card-img-top' src='./assets/images/<?php echo$row['product_image1']?>' alt='Card image cap'>
              <div class='card-body'>
                  <h5 class='card-title'><?php echo$row['product_name']?></h5>
                  <p class='card-text text-center'><?php echo$row['product_price']?></p>
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
             <img class='card-img-top' src='./assets/images/<?php echo$row['product_image1']?>' alt='Card image cap'>
             <div class='card-body'>
                 <h5 class='card-title'><?php echo$row['product_name']?></h5>
                 <p class='card-text text-center'><?php echo$row['product_price']?></p>
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
             <img class='card-img-top' src='./assets/images/<?php echo$row['product_image1']?>' alt='Card image cap'>
             <div class='card-body'>
                 <h5 class='card-title'><?php echo$row['product_name']?></h5>
                 <p class='card-text text-center'><?php echo$row['product_price']?>/-</p>
                 <a href='single-product.php?product_id=<?php echo $row['product_id'] ?>' class='btn btn-primary'>Buy now</a>
             </div>
         </div>
         </div>
          <?php } ?>


          


       </div>
   </div>

    <footer class="mb-0">
        <div class=" bg-primary p-3 text-light ">
            <p class="text-center ">@copyright 2022</p>
        </div>

    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>