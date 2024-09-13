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
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href = "style.css">
    <style >
        .prod_img{
    width:100px;
    height: 100px;
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
          <a class="nav-link" href="./customer/cust_signup.php" style="color:white;">REGISTER</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./customer/cust_signin.php" style="color:white;">LOGIN</a>
        </li>
</ul>
        
        
             
    </div>
  </div>
</nav>

<?php
orders();
?>
<div class="container">
    <div class="row">
    <form action="" method="post">
        <table class="table table-bordered">
            
            <?php
             global $con;
             $get_c_id= c_id();
             $total_price=0;
             $orders="Select * from `orders` where c_id = '$get_c_id'";
             $result_query=mysqli_query($con,$orders);
             $result_count=mysqli_num_rows($result_query);
             if($result_count>0){
                echo "<thead>
                <tr>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Total Quantity </th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>";
             while($row=mysqli_fetch_array($result_query)){
                 $prod_id=$row['prod_id'];
                 $select_query="Select * from `products` where prod_id='$prod_id'";
                 $result_query=mysqli_query($con,$select_query);
                 while($row_price=mysqli_fetch_array($result_query)){
                     $prod_price=array($row_price['prod_price']);
                     $price_table=$row_price['prod_price'];
                     $prod_name=$row_price['prod_name'];
                     $prod_image=$row_price['prod_image'];
                     $prod_values=array_sum($prod_price);
                     $total_price+=$prod_values;
            ?>
                <tr>
                <td><?php echo $prod_name?></td>
                <td><img src="./images/<?php echo $prod_image?>" alt="" class="prod_img"></td>
                <td><input type="text" name="qty" id="" class="form-input w-50"></td>
                <?php
                $get_c_id= c_id();
                if(isset($_POST['update_order'])){
                    $quantities=$_POST['qty'];
                    $update_order="update `orders` set quantity=$quantities where c_id='$get_c_id'";
                    $result_prod=mysqli_query($con,$update_order);
                    $total_price=$total_price*$quantities;
                }
                ?>
            </tr>
            <?php
                 }
                }
             }
            ?>
            </tbody>
        </table>
        <div class="d-flex mb-5">
            <?php
            $get_c_id= c_id();
            $order_query="Select * from `orders` where c_id = '$get_c_id'";
            $result_query=mysqli_query($con,$order_query);
            $result_count=mysqli_num_rows($result_query);
            if($result_count>0){
            echo"<input type='submit' value='Continue Shopping' class='btn btn-primary px-3 py-2 border-0 mx-3' 
            name='continue_shopping'>
            <input type='submit' value='Checkout' class='btn btn-primary px-3 py-2 border-0 mx-3' name='checkout'>";
            }else{
                echo"  <input type='submit' value='Continue Shopping' 
                class='btn btn-primary px-3 py-2 border-0 mx-3' name='continue_shopping'>";
            }
            if(isset($_POST['continue_shopping'])){
                echo"<script>window.open('index.php','_self')</script>";
            }
            if(isset($_POST['checkout'])){
                echo"<script>window.open('./customer/payment.php','_self')</script>";
                
            }
            ?> 
    </div>
    </div>
</div>
            </form>
<div class="bg-dark p-3 text-center p-0">
  <p style="color:white;">ALL RIGHTS RESERVED @ADITYA.   FOR MORE DETAILS CONTACT onestore@email.com</p>
</div>
</div> 
</body>
</html>