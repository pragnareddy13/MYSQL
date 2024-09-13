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
    <title>User Signin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body{
        overflow: hidden;
    }
</style>
</head>
<body>
    <div class="container-fluid m-3">
    <form action="" method="post">
        <table class="table table-bordered">
        </tbody>
            <tr>
        <h2 class="text-center mb-5">SIGN IN</h2>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="c_email" class="form-label">EMAIL</label>
                        <input type="email" id="c_email" name="c_email"
                        placeholder="ENTER YOUR EMAIL" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="c_password" class="form-label">PASSWORD</label>
                        <input type="password" id="c_password" name="c_password"
                        placeholder="ENTER YOUR PASSWORD" required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary px-2 py-2"
                    name="cust_signin" value="SIGN IN">
                </div>
                <p class="small fw-semibold mt-2 pt-1">ACCOUNT DOESN'T EXIST? <a href ="cust_signup.php ">SIGN UP</a></p>
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
if(isset($_POST['cust_signin'])){
    $c_email=$_POST['c_email'];
    $c_password=$_POST['c_password'];
    
    $select_query="Select * from `customer` where c_email='$c_email' and c_password='$c_password'";
    $result_query=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result_query);
    $row_data=mysqli_fetch_assoc($result_query);
    $c_id=c_id();

    $select_query_order="Select * from `customer` where c_id='$c_id'";
    $select_order=mysqli_query($con,$select_query_order);
    $row_count_order=mysqli_num_rows($select_order);
        if($_SESSION['c_email']=$c_email){ 
             echo "<script>window.open('../index.php','_self')</script>";
        }
    }else{
        echo"<script>alert('user details not found')</script>";
    }
?>