<?php
   include_once 'include/header.php';
   include_once 'include/sidebar.php';
    include_once 'classes/Category.php';

    if(!empty($_SESSION['user_id'])){ 

   $ct = new Category();
   if(isset($_GET['editId'])){
    $id = base64_decode($_GET['editId']);
   }
   else{
    header('location:categoryshow.php');
   }


   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $catName = $_POST['catName'];
    $catAdd = $ct->UpdateCategory($catName,$id);

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
                                        <h4 class="card-title">Category update From</h4>
                                        <?php
                                        $getData = $ct->getEdit($id);
                                        if($getData){
                                            while($row= mysqli_fetch_assoc($getData)){
                                                ?>
                                                
                                                     
                                        <form action="" method="POST">
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" name="catName" class="form-control"  value="<?= $row['catName']?>"/>
                                            </div>
        
                                        
                                            <div>
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        add category
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