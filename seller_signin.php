<?php
include('../dbconnect/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELLER SIGN IN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" 
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body{
        overflow: hidden;
    }
</style>
</head>
<body>
<div class="container-fluid m-3 bg-white">
    <form action="" method="post">
        <table class="table table-bordered">
        </tbody>
            <tr>
        <h2 class="text-center mb-5">SELLER SIGN IN</h2>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="s_email" class="form-label">EMAIL</label>
                        <input type="email" id="s_email" name="s_email"
                        placeholder="ENTER YOUR EMAIL" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="s_password" class="form-label">PASSWORD</label>
                        <input type="password" id="s_password" name="s_password"
                        placeholder="ENTER YOUR PASSWORD" required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary py-2 px-3 border-0"
                    name="seller_signin" value="SIGN IN">
                </div>
                <p class="small fw-semibold mt-2 pt-1">ACCOUNT DOESN'T EXIST? <a href ="seller_Signup.php ">SIGN UP</a></p>
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
if(isset($_POST['seller_signin'])){
    $s_email=$_POST['s_email'];
    $s_password=$_POST['s_password'];
    
    $select_query="Select * from `seller` where s_email='$s_email' and s_password='$s_password'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    if($_SESSION['s_email']=$s_email){
            echo "<script>window.open('index.php','_self')</script>";
        }
    else{
        echo"<script>alert('user details not found')</script>";
    }
}
?>