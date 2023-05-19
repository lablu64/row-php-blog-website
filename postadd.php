<?php
   include_once 'include/header.php';
   include_once 'include/sidebar.php';
    include_once 'classes/Post.php';
    include_once 'classes/Category.php';
    if(!empty($_SESSION['user_id'])){ 

    // include_once '.php';
   $post = new Post();
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $post_add = $post->AddPost($_POST,$_FILES);

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

                                          
                                    <div class="card-body">
                                    <?php
                                        if(isset($post_add)):
                                        ?>

                                        <div class="alert alert-success" id="success-alert">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                            
                                        <strong><?=$post_add?></strong>
                                        
                                        
                                    
                                    </div>
                                    <?php  
                                    endif;
                                    ?>
                                     
                                    
                                        <h4 class="card-title">post</h4>
                                        
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="mb-3">
                                                <label class="form-label">post title</label>
                                                <input type="text" name="post_title" class="form-control"  placeholder="enter the post title "/>
                                            </div>


                                            <div class="mb-3 ">
                                            <label class=" col-form-label">category Select</label>
                                            <div >
                                                <select name="catId" class="form-select">
                                                    <option>Select</option>
                                                    <?php 
                                                          $ct = new Category();
                                                        
                                                         $allCat = $ct->AllCategory();
                                                
                                                        if($allCat){
                                                            
                                                            while($row= mysqli_fetch_assoc($allCat)){
                                                                
                                                                ?>
                                                            <option value="<?=$row['catId'] ?>"><?=$row['catName'] ?></option>

                                                            <?php
                                                            }
                                                        }
                                                        ?>
                                                   
                                                </select>
                                            </div>
                                             </div>


                                            <div class="mb-3">
                                                <label class="form-label">Image One</label>
                                                <input type="file" name="image_one" class="form-control"  />
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Description one</label>
                                                <textarea id="classic-editor" name="des_one"></textarea>
           
                                            </div>
                                            <!-- <div class="mb-3">
                                                <label class="form-label">Image two</label>
                                                <input type="file" name="image_two" class="form-control"  />
                                            </div> -->

                                            <!-- <div class="mb-3">
                                                <label class="form-label">Description two</label>
                                                <textarea id="classic-editor1" name="des_two"></textarea>
           
                                            </div> -->

                                            <!-- <div class="mb-3 ">
                                            <label class=" col-form-label">Post type</label>
                                            <div >
                                                <select name="postType" class="form-select">
                                                    <option>Select</option>
                                                    <option value="1">silder</option>
                                                    <option value="2">post</option>
                                                </select>
                                            </div>
                                             </div> -->

                                             <div class="mb-3">
                                                <label class="form-label">post tags </label>
                                                <input type="text" name="post_tags" class="form-control"  />
                                            </div>



                                          
        
                                        
                                            <div>
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        add post
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
