<?php

function home(){
    global $con;
    if(!isset($_GET['cat_id'])){
    $select_query="Select * from `products` order by rand() limit 0,8";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
        $prod_id=$row['prod_id'];
        $prod_name=$row['prod_name'];
        $prod_price=$row['prod_price'];
        $prod_description=$row['prod_description'];
        $prod_image=$row['prod_image'];
        echo "<div class = 'col-md-3 mb-2'>
        <div class='card bg-dark align-items:center' >
  <img src='./seller/prod_images/$prod_image' class='card-img-top px-3 py-3' alt='...'>
  <div class='card-body'>
    <h5 class='card-title' style='color:white;'>$prod_name</h5>
    <p class='card-text' style='color:white;'>$ $prod_price</p>
    <p class='card-text' style='color:white;'>$prod_description</p>
    <a href='index.php?order=$prod_id' class='btn btn-primary justify-content:center align-items:center;'>ORDER NOW</a>
  </div>
</div>
</div>";    
    }
}
}

function products(){
    global $con;
    if(!isset($_GET['cat_id'])){
        $select_query="Select * from `products` order by rand() ";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
            $prod_id=$row['prod_id'];
            $prod_name=$row['prod_name'];
            $prod_price=$row['prod_price'];
            $prod_description=$row['prod_description'];
            $prod_image=$row['prod_image'];
            $cat_id=$row['cat_id'];
            echo "<div class = 'col-md-3 mb-2'>
            <div class='card bg-dark align-items:center' >
      <img src='./seller/prod_images/$prod_image' class='card-img-top px-3 py-3' alt='...'>
      <div class='card-body'>
        <h5 class='card-title' style='color:white;'>$prod_name</h5>
        <p class='card-text' style='color:white;'>$ $prod_price</p>
        <p class='card-text' style='color:white;'>$prod_description</p>
        <a href='index.php?order=$prod_id' class='btn btn-primary justify-content:center align-items:center;'>ORDER NOW</a>
      </div>
    </div>
    </div>";  
    }
}
}

function uploaded_products(){
    global $con;
    if(!isset($_GET['cat_id'])){
    $select_query="Select * from `products` order by rand()";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
        $prod_id=$row['prod_id'];
        $prod_name=$row['prod_name'];
        $prod_price=$row['prod_price'];
        $prod_description=$row['prod_description'];
        $prod_image=$row['prod_image'];
        $cat_id=$row['cat_id'];
        echo "<div class = 'col-md-3 mb-2'>
        <div class='card bg-dark align-items:center' >
        <img src='./prod_images/$prod_image' class='card-img-top px-3 py-3' alt='...'>
        <div class='card-body'>
          <h5 class='card-title' style='color:white;'>$prod_name</h5>
          <p class='card-text' style='color:white;'>$ $prod_price</p>
          <p class='card-text' style='color:white;'>$prod_description</p>
  </div>
</div>
</div>";    
    }
}
}
function orders(){
    if(isset($_GET['order'])){
        global $con;
        $get_c_id = c_id();
        $get_prod_id=$_GET['order'];
        $select_query="Select * from `orders` where c_id='$get_c_id' and prod_id=$get_prod_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows>0){
            echo "<script>alert(' This item is already present inside cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }else{
            $insert_query="insert into `orders`(prod_id,c_id,quantity) values ($get_prod_id,'$get_c_id',0)";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}


function c_id() {  
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
               $ip = $_SERVER['HTTP_CLIENT_IP'];  
       }  
   elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
               $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }   
   else{  
            $ip = $_SERVER['REMOTE_ADDR'];  
    }  
    return $ip;  
}  


function categories_data(){
    global $con;
    if(isset($_GET['cat_id'])){
        $cat_id=$_GET['cat_id'];
        $select_query="Select * from `products` where cat_id=$cat_id";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
            $prod_id=$row['prod_id'];
            $prod_name=$row['prod_name'];
            $prod_price=$row['prod_price'];
            $prod_description=$row['prod_description'];
            $prod_image=$row['prod_image'];
            $cat_id=$row['cat_id'];
            echo "<div class = 'col-md-3 mb-2'>
            <div class='card bg-dark align-items:center' >
      <img src='./seller/prod_images/$prod_image' class='card-img-top px-3 py-3' alt='...'>
      <div class='card-body'>
        <h5 class='card-title' style='color:white;'>$prod_name</h5>
        <p class='card-text' style='color:white;'>$ $prod_price</p>
        <p class='card-text' style='color:white;'>$prod_description</p>
        <a href='index.php?order=$prod_id' class='btn btn-primary justify-content:center align-items:center;'>ORDER NOW</a>
      </div>
    </div>
    </div>";  
        
    }
}
}


function categories_types(){
    global $con;
    $select_categories="Select * from `categories`";
$result_categories=mysqli_query($con,$select_categories);
while($row_data=mysqli_fetch_assoc($result_categories)){
    $cat_id=$row_data['cat_id'];
    $cat_name=$row_data['cat_name'];
    echo "<li class='nav-item'>
    <a href='index.php?cat_id=$cat_id' class='nav-link text-light'>$cat_name</a>
        </li>";
}
}



function total_cart_price(){
    global $con;
    $get_c_id=c_id();
    $total_price=0;
    $cart_query="Select * from `orders` where c_id ='$get_c_id'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
        $prod_id=$row['prod_id'];
        $select_products="Select * from `products` where prod_id='$prod_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_price=mysqli_fetch_array($results_products)){
            $prod_price=array($row_price['prod_price']);
            $product_values=array_sum($prod_price);
            $total_price+=$product_values;
        }   
    }
    echo $total_price;
}

?>
