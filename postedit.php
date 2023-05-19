<?php
   error_reporting(0);
   include_once 'include/header.php';
   include_once 'include/sidebar.php';
    include_once 'classes/Post.php';
    if(!empty($_SESSION['user_id'])){ 

    $post = new Post();
    include_once 'classes/Category.php';

    $ct = new Category();


    if(isset($_GET['editId'])){
        $id = base64_decode($_GET['editId']);
        
       }
  
  
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
   

    $post_title = $_POST['post_title'];
    $image_one = $_FILES['image_one']['name'];
    $des_one = $_POST['des_one'];
    // $des_two = $_POST['des_two'];
    $post_tags = $_POST['post_tags'];
    $post_edit = $post->EditPostStore($post_title,$image_one,$des_one,$post_tags,$id,$data);

 }


 ?>
          
            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                    <div class="row">
                            <div class="col-xl-10">
                                <div class="card">

                                <?php
                                        if(isset($post_edit)):
                                        ?>

                                        <div class="alert alert-success" id="success-alert">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                            
                                        <strong><?=$post_edit?></strong>
                                        
                                        
                                    
                                    </div>
                                    <?php  
                                    endif;
                                    ?>
                                     
                                
                                      
                                    <div class="card-body">
                               
                                        <h4 class="card-title">post</h4>

                                        <?php
                                        $edit_post = $post->EditPost($id);
                                        
                                        if($edit_post){
                                            while($prow= mysqli_fetch_assoc($edit_post)){
                                         ?>
                                                
                                        
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label class="form-label">post title</label>
                                                <input type="text" name="post_title" class="form-control"  value="<?=$prow['post_title']?>"/>
                                            </div>

<!-- 
                                            <div class="mb-3 ">
                                            <label class=" col-form-label">category Select</label>
                                            <div >
                                                <select name="catId" class="form-select">
                                                    <option>Select</option>
                                                    <?php 
                                                         
                                                        
                                                         $allCat = $ct->AllCategory();
                                                
                                                        if($allCat){
                                                            
                                                            while($row= mysqli_fetch_assoc($allCat)){
                                                                
                                                                ?>
                                                            <option <?=$prow['catId'] == $row['catId']? 'selected':'' ?> value="<?=$row['catId'] ?>"><?=$row['catName'] ?></option>

                                                            <?php
                                                            }
                                                        }
                                                        ?>
                                                   
                                                </select>
                                            </div>
                                             </div> -->


                                            <div class="mb-3">
                                                <label class="form-label">Image One</label>
                                                <input type="file" name="image_one" class="form-control"  />
                                                <img style="width:70px;" src="<?=$prow['image_one'] ?>" alt="">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Description one</label>
                                                <textarea id="classic-editor" name="des_one"><?=$prow['des_one'] ?></textarea>
           
                                            </div>
                                           

                                            <!-- <div class="mb-3">
                                                <label class="form-label">Description two</label>
                                                <textarea id="classic-editor1" name="des_two"><?=$prow['des_two'] ?></textarea>
           
                                            </div> -->

                                           

                                             <div class="mb-3">
                                                <label class="form-label">post tags </label>
                                                <input type="text" name="post_tags" class="form-control" value="<?=$prow['post_tags'] ?>"  />
                                            </div>



                                          
        
                                        
                                            <div>
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        edit post
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



