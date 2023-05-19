<?php
   include_once 'include/header.php';
   include_once 'include/sidebar.php';
    include_once 'classes/Password.php';

    if(!empty($_SESSION['user_id'])){ 

   $pas = new Password();
   if(isset($_GET['editId'])){
    $id =$_GET['editId'];
   }
 


   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $passdd = $pas->updatepas($email,$password,$id);

 }
 ?>
          
            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                    <div class="row">
                            <div class="col-xl-6">
                                <div class="card">

                                <?php
                                   if(isset($passdd)):
                                  ?>

                                <div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                     
                                <strong><?=$passdd?></strong>
                                
                                   
                            
                            </div>
                            <?php  
                              endif;
                            ?>

                                    <div class="card-body">
                                        <h4 class="card-title">user  update From</h4>
                                        <?php
                                        $getData = $pas->getEdit($id);
                                        if($getData){
                                            while($row= mysqli_fetch_assoc($getData)){
                                                ?>
                                                
                                                     
                                        <form action="" method="POST">
                                            <div class="mb-3">
                                                <label class="form-label">email</label>
                                                <input type="text" name="email" class="form-control"  value="<?= $row['email']?>"/>
                                            </div>
                                           

                                            <div class="mb-3">
                                                <label class="form-label"> new password</label>
                                                <input type="text" name="password" class="form-control" />
                                            </div>

                                          
        
                                        
                                            <div>
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        update Email and Password
                                                    </button>
                                                   
                                                </div>
                                            </div>
                                        </form>
                                                
                                                
                                                
                                              <?php
                                            }
                                        }
                                        
                                        ?>
                                   
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
        
                        </div>


                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <?php
                    include_once 'include/footer.php';
                ?>

                <?php
                        }
                        else{
                            header("location: login.php"); 
                        }
               ?>
                 <script>
                    $("#success-alert").fadeTo(2000000, 100000).slideUp(100000, function(){
                       $("#success-alert").slideUp(100000);
                   });
           
           
                   $(document).ready(function() {
                   $("#success-alert").hide();
                   $("#myWish").click(function showAlert() {
                       $("#success-alert").fadeTo(2000000, 100000).slideUp(100000, function() {
                       $("#success-alert").slideUp(100000);
                       });
                   });
                   });
               </script>