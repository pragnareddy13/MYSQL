<?php
include('dbconnect/dbconnection.php');
include('function/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE ONE STORE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href = "style.css">
    <style>
      .card-img-top{
    width:100%;
    height:200px;
    object-fit:contain;
}

    </style>
</head>
<body>


  <div class="container-fluid p-0 bg-secondary">
  <nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
    <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light"  name="search_data_product">
      </form>
      <ul class="navbar-nav me-auto  px-5 mb-2 mb-lg-0" >
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php" style="color:white;"><i class="fa-solid fa-house"></i> HOME</a>
        </li>
        <li class="nav-item" >
          <a class="nav-link" href="products.php" style="color:white;">PRODUCTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="orders.php" style="color:white;"><i class="fa-brands fa-docker"></i> ORDERS</i></a>
        </li>
        <?php
categories_types();
?>
</ul>
<ul class="navbar-nav  mb-2 mb-lg-0">
<li class="nav-item">
          <a class="nav-link" href="./user/user_login.php" style="color:white;">REGISTER</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user/user_login.php" style="color:white;">LOGIN</a>
        </li>
</ul>
        
        
             
    </div>
  </div>
</nav>

<?php
orders();

?>

<div class="row p-3"> 
<div class = "col-md-12 mb-2">
<div class='row'>
    <?php
products();
categories_data();
?>
</div> 
</div>
</div>

<div class="bg-dark p-3 text-center p-0">
  <p style="color:white;">ALL RIGHTS RESERVED @ADITYA.   FOR MORE DETAILS CONTACT onestore@email.com</p>
</div>
</div> 


</body>
</html>