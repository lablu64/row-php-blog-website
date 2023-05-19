<?php

 

   include_once 'include/header.php';
   include_once 'include/sidebar.php';
    include_once 'classes/Category.php';
    if(!empty($_SESSION['user_id'])){ 

    

   $ct = new Category();
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $catName = $_POST['catName'];
    $catAdd = $ct->AddCategory($catName);

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
                                   if(isset($catAdd)):
                                  ?>

                                <div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                     
                                <strong><?=$catAdd?></strong>
                                
                                   
                            
                            </div>
                            <?php  
                              endif;
                            ?>

                                <div class="card-body">
                                        <h4 class="card-title">Category</h4>
                                        
                                        <form action="" method="POST">
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" name="catName" class="form-control"  placeholder="Type category name"/>
                                            </div>
        
                                        
                                            <div>
                                                <div>
                                                    <button id="myWish" href="javascript:;" type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        add category
                                                    </button>
                                                   
                                                </div>
                                            </div>
                                        </form>
        
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
                    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
                       $("#success-alert").slideUp(500);
                   });
           
           
                   $(document).ready(function() {
                   $("#success-alert").hide();
                   $("#myWish").click(function showAlert() {
                       $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                       $("#success-alert").slideUp(500);
                       });
                   });
                   });
               </script>
             