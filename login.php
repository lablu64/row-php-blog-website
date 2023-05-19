<?php
$conn = new mysqli('localhost','root','','hati');
session_start();

 if(empty($_SESSION['user_id'])){

if(isset($_POST['email']) && isset($_POST['password'])  ){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    if(!empty( $email) && !empty($password)){
        $user_sql = " SELECT userId  FROM users WHERE email='$email' AND password='$password'";
         $user_sql_query=mysqli_query($conn,$user_sql);
         $mysquli_num_row =mysqli_num_rows($user_sql_query);

         if($mysquli_num_row){
            $data = mysqli_fetch_array($user_sql_query);
            $userId = $data['userId'];
            // echo $userId;
            // die();
            $_SESSION['user_id'] =$userId;
            // echo $_SESSION['user_id'];
            // die();
           
            header("location: admin.php");
         }else{
            echo 'Invaild email and password please try again';
         }

    }else{
        echo 'Fild Must not be empty';
    }

}
 
?>


<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesbrand.com/minible/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Jul 2021 13:45:16 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Login | Minible - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <a href="index.html" class="mb-5 d-block auth-logo">
                                <img src="upload/logo.png" alt="" height="82" class="logo logo-dark">
                                <img src="upload/logo.png" alt="" height="82" class="logo logo-light">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                       
                           
                            <div class="card-body p-4"> 
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to Ant BD .</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="" method="POST">
        
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
                                        </div>
                
                                        <div class="mb-3">
                                          
                                            <label class="form-label" for="userpassword">Password</label>
                                            <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password">
                                        </div>
                
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div>
                                        
                                        <div class="mt-3 text-end">
                                            <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log In</button>
                                        </div>
            
                                        

                                        
                                   
                                    </form>

                                    
                                </div>
            
                            </div>
                        </div>

                       

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

        <?php
                                     }else{
                                        header("location: admin.php");
                                     }
                                    
                                    ?>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>

    </body>

<!-- Mirrored from themesbrand.com/minible/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Jul 2021 13:45:16 GMT -->
</html>
