<?php
error_reporting(0);
   include_once 'include/header.php';
   include_once 'include/sidebar.php';
    include_once 'classes/Post.php';
    if(!empty($_SESSION['user_id'])){ 

   $pt = new Post();
   include_once 'helpers/Format.php';
   $fr = new Format();
   $allPost = $pt->GetAllPost();

   if($_GET['action']){
    $aid= $_GET['action'];
    $active = $pt->Active($aid);
   }

   if($_GET['deaction']){
    $deid= $_GET['deaction'];
    $deative = $pt->DeActive($deid);
   }

   

   if($_GET['delpost']){
    $id= base64_decode($_GET['delpost']);
    $deletepost = $pt->DeletePost($id);
   }
 ?>

 <?php
    if(!isset($_GET['id'])){
        echo "<meta http-equiv='refresh' content='0;URL=?id=ahr'/>";
     }
 
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
                                        if(isset($deactive)):
                                        ?>
                                    <div class=" alert alert-warning alert-dismissible fade show">
                                        <?=$dactive?>

                                    </div>



                                    <?php  
                                        endif;
                                    ?>

                                    <?php
                                        if(isset($active)):
                                        ?>
                                    <div class=" alert alert-warning alert-dismissible fade show">
                                        <?=$active?>

                                    </div>



                                    <?php  
                                        endif;
                                    ?>
                            

                                    <div class="card-body">
        
                                        <h4 class="card-title">Post List</h4>
                                       
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>title</th>
                                                <th>category</th>
                                                <th>image </th>
                                               
                                               

                                                <th>action</th>
                                              
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                                <?php 
                                                
                                                if($allPost){
                                                    $i=0;
                                                    while($row= mysqli_fetch_assoc($allPost)){
                                                            $i++;
                                                        ?>
                                                              <tr>
                                                                <td><?=$i?></td>
                                                                <td><?=$fr->textShorten($row['post_title'],20)?></td>
                                                                <td><?=$row['catName']?></td>
                                                                <!-- <td><?=$fr->textShorten($row['des_one'],20) ?></td> -->
                                                                <td><img style="width:70px;" src="<?=$row['image_one']?>" alt=""></td>
                                                               
                                                               
                                                         
                                                                <td>
                                                                    <a href="postedit.php?editId=<?=base64_encode($row['Id']) ?>" class="btn btn-success">Edit</a>
                                                                    <a href="?delpost=<?=base64_encode($row['Id'])?> " onclick="return confirm('Are your sure to delete - ')" class="btn btn-danger">Delete</a>
                                                                    
                                                                  

                                        
                                
                                                                
                                                               
                                                                    <a href="" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg-<?=$row['Id'] ?>">view</a>
                                                                    
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





              <!-- model_exmple here start -->


                <?php

                $model_view_post = $pt->ModelData();
                
                
                
                ?>


                                                  <?php 
                                                
                                                        if($model_view_post){
                                                            $i=0;
                                                            while($mrow= mysqli_fetch_assoc($model_view_post)){
                                                                    $i++;
                                                        ?>




                <div class="modal fade bs-example-modal-lg-<?=$mrow['Id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="myLargeModalLabel"><?=$mrow['post_title'] ?></h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <td><label for="">Title - </label></td>
                                                                        <td><?=$mrow['post_title'] ?></td>
                                                                    </tr> 
                                                                    <tr>   

                                                                        <td><label for="">Category - </label></td>
                                                                        <td><?=$mrow['catName'] ?></td>
                                                                    </tr> 
                                                                    <tr>   

                                                                            <td><label for="">Image - </label></td>
                                                                            <td><img style="width:100px;" src="<?=$mrow['image_one'] ?>" alt="<?=$mrow['post_title'] ?>"></td>
                                                                            </tr> 
                                                                    <tr>   

                                                                        <td><label for="">Description One - </label></td>
                                                                        <td><?=$mrow['des_one'] ?></td>
                                                                    </tr>
                                                                     
                                                             <tr>
                                                                <td><label for="">Post Tags - </label></td>
                                                                <td><?=$mrow['post_tags']?></td>
                                                            </tr>
                                                               

                                                                </table>
  
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-success waves-effect" data-bs-dismiss="modal">Close</button>
                                                                </div>


                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->

                                                    
                                                <?php
                                                    }
                                                }
                                                ?>


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