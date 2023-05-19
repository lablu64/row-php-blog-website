<?php
   include_once 'include/header.php';
   include_once 'include/sidebar.php';
    include_once 'classes/Category.php';
    if(!empty($_SESSION['user_id'])){ 

   $ct = new Category();
   $allCat = $ct->AllCategory();

   if($_GET['delCat']){
    $id= base64_decode($_GET['delCat']);
    $deleteCat = $ct->DeleteCategory($id);
   }
 ?>

 <?php
    // if(!isset($_GET['id'])){
    //     echo "<meta http-equiv='refresh' content='0;URL=?id=ahr'/>";
    //  }
 
 ?>
          
            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                    <div class="row">
                            <div class="col-12">
                                <div class="card">


                                <?php
                                   if(isset($deleteCat)):
                                  ?>

                                <div class="alert alert-success" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                     
                                <strong><?=$deleteCat?></strong>
                                
                                   
                            
                            </div>
                            <?php  
                              endif;
                            ?>


                                    <div class="card-body">
        
                                        <h4 class="card-title">Category List</h4>
                                       
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>action</th>
                                              
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php 
                                                
                                                if($allCat){
                                                    $i=0;
                                                    while($row= mysqli_fetch_assoc($allCat)){
                                                            $i++;
                                                        ?>
                                                              <tr>
                                                                <td><?=$i?></td>
                                                                <td><?=$row['catName']?></td>
                                                                <td>
                                                                    <a href="catEdit.php?editId=<?=base64_encode($row['catId']) ?>" class="btn btn-success">Edit</a>
                                                                    <a href="?delCat=<?=base64_encode($row['catId'])?> " onclick="return confirm('Are your sure to delete - <?=$row['catName']?>')" class="btn btn-danger">Delete</a>
                                                            
                                                                </td>
                                                            
                                                            </tr>
                                                        
                                                        <?php
                                                    }
                                                }
                                                ?>
                                          
                                          </tbody>
                                        </table>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                    
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