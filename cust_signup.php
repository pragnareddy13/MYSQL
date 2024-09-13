<?php
include('../dbconnect/dbconnection.php');
include('../function/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">USER SIGNUP</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="c_first" class="form-label">FIRSTNAME</label>
                        <input type="text" id="c_first" name="c_first"
                        placeholder="Enter first name" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="c_last" class="form-label">LASTNAME</label>
                        <input type="text" id="c_last" name="c_last"
                        placeholder="Enter last name" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="c_email" class="form-label">EMAIL</label>
                        <input type="email" id="c_email" name="c_email"
                        placeholder="Enter Email" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="c_password" class="form-label">PASSWORD</label>
                        <input type="password" id="c_password" name="c_password"
                        placeholder="Enter Password" autocomplete="off" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="c_confirm_password" class="form-label">CONFIRM PASSWORD</label>
                        <input type="password" id="c_confirm_password" name="c_confirm_password"
                        placeholder="Enter Confirm Password" autocomplete="off" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="c_address" class="form-label">ADDRESS</label>
                        <input type="text" id="c_address" name="c_address"
                        placeholder="Enter Address" autocomplete="off" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="c_mobile" class="form-label">CONTACT NUMBER</label>
                        <input type="text" id="c_mobile" name="c_mobile"
                        placeholder="Enter contact number" autocomplete="off" required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary px-2 py-2 "
                    name="user_registration" value="SIGN UP">
                </div>
                <p class="small fw-semibold mt-2 pt-1">ALREADY HAVE AN ACCOUNT?<a href ="cust_signin.php ">LOGIN</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['user_registration'])){
    $c_id=c_id();
    $c_first=$_POST['c_first'];
    $c_last=$_POST['c_last'];
    $c_email=$_POST['c_email'];
    $c_address=$_POST['c_address'];
    $c_mobile=$_POST['c_mobile'];
    $c_password=$_POST['c_password'];
    $c_confirm_password=$_POST['c_confirm_password'];


    $select_query="Select * from `customer` where c_mobile='$c_mobile' or c_email='$c_email'";
    $result_query=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result_query);
    if($rows_count>0){
        echo "<script>alert('customer exists')</script>";
    }else if($c_password!=$c_confirm_password){
        echo "<script>alert('password do not match')</script>";
    }
    else{
    $insert_query="insert into `customer` (c_id,c_first,c_last,c_email,c_address,c_mobile,c_password) values('$c_id','$c_first','$c_last','$c_email','$c_address','$c_mobile','$c_password')";
    $sql_execute=mysqli_query($con,$insert_query);
    echo "<script>window.open('cust_signin.php','_self')</script>";
}
}
?>