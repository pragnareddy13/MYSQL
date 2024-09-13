<?php
include('../dbconnect/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELLER SIGN UP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .p1 {
  font-family: "Times New Roman", Times, serif;
}
</style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5 p1">SELLER SIGN UP</h2>
        <div class="row d-flex justify-content-center ">
            <form>
                <table>
                    <tbody>
                        <tr>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="s_name" class="form-label">Name</label>
                        <input type="text" id="s_name" name="s_name"
                        placeholder="Enter Username" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="s_email" class="form-label">Email</label>
                        <input type="email" id="s_email" name="s_email"
                        placeholder="Enter Email" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="s_password" class="form-label">Password</label>
                        <input type="password" id="s_password" name="s_password"
                        placeholder="Enter Password" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="s_confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="s_confirm_password" name="s_confirm_password"
                        placeholder="Enter Confirm Password" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="s_address" class="form-label">Address</label>
                        <input type="text" id="s_address" name="s_address"
                        placeholder="Enter Address" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="s_mobile" class="form-label">Mobile</label>
                        <input type="text" id="s_mobile" name="s_mobile"
                        placeholder="Enter Mobile Number" required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary py-2 px-2 "
                    name="seller_signup" value="SIGN UP">
                </div>
                <p class="small fw-semibold mt-2 pt-1">ALREADY HAVE AN ACCOUNT?<a href ="seller_signin.php ">LOGIN</a></p>
                </form>
            </tr>
        </tbody>
    </table>
</form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['seller_signup'])){
    $s_name=$_POST['s_name'];
    $s_email=$_POST['s_email'];
    $s_password=$_POST['s_password'];
    $s_address=$_POST['s_address'];
    $s_mobile=$_POST['s_mobile'];
    $s_confirm_password=$_POST['s_confirm_password'];
    $select_query="Select * from `seller` where s_name='$s_name' or s_email='$s_email'";
    $result_query=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result_query);
    if($rows_count>0){
        echo "<script>alert('User already exists')</script>";
    }else if($s_password!=$s_confirm_password){
        echo "<script>alert('passwords do not match')</script>";
    }
    else{
    $insert_query="insert into `seller` (s_name,s_email,s_password,s_address,s_mobile) values('$s_name','$s_email','$s_password','$s_address','$s_mobile')";
    $sql_execute=mysqli_query($con,$insert_query);
    echo "<script>window.open('admin_login.php','_self')</script>";
}
}
?>