<?php
   include_once 'include/header.php';
   include_once 'include/sidebar.php';
    include_once 'classes/Category.php';
    if(!empty($_SESSION['user_id'])){ 

   $ct = new Category();
   if(isset($_GET['metaeditId'])){
    $metaId = base64_decode($_GET['metaeditId']);
   }
   

   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $meta_des = $_POST['meta_des'];
    $metaAdd = $ct->UpdateMeta($meta_des,$metaId);

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
                                   if(isset($metaAdd)):
                                  ?>

                                <div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                     
                                <strong><?=$metaAdd?></strong>
                                
                                   
                            
                            </div>
                            <?php  
                              endif;
                            ?>




                                    <div class="card-body">
                                        <h4 class="card-title">Meta Decription From</h4>
                                        <?php
                                        $getData = $ct->metaEdit($metaId);
                                        if($getData){
                                            while($row= mysqli_fetch_assoc($getData)){
                                                ?>
                                                
                                                     
                                        <form action="" method="POST">
                                        
                                            <div class="mb-3">
                                                
                                                <textarea  name="meta_des"  cols="40" rows="20"><?= $row['meta_des']?></textarea>
                                              
                                            </div>
        
                                        
                                            <div>
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                         Meta Description
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