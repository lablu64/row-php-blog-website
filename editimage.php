<?php
$conn = new mysqli('localhost','root','','hati');

   include_once 'inc/header.php';
   include_once 'inc/sidebar.php';
    include_once '../classes/Post.php';
    if(!empty($_SESSION['user_id'])){ 

    $post = new Post();
   


    if(isset($_GET['editId'])){
        $id = base64_decode($_GET['editId']);
        
       }

    if(isset($_POST['submit_image'])){

        $new_image = $_FILES['image_one']['name'];
       
        $old_image = $_POST['image_old'];
       
        if($new_image != ''){
            $update_filename =$new_image;

        }else{
            $update_filename =$old_image;

        }

        $insert_que = " UPDATE `posts` SET `image_one`='$update_filename' WHERE Id='$id' ";
        $insert_result= mysqli_query($conn,$insert_que);

            if($insert_result){
                if($_FILES['image_one']['name'] !=''){
                    $file_temp = $_FILES['image_one']['tmp_name'];
                    $div = explode('.',$_FILES['image_one']['name']);
                    $file_ext = strtolower(end($div));
                    $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
                    $upload_image = "upload/".$unique_image;
                    echo $unique_image;
            
                   
                    //    move_uploaded_file($file_temp,$upload_image);
                    //    unlink('upload/',$old_image);
                    
                   echo move_uploaded_file($file_temp,$upload_image);
                    
                    unlink('upload/'.$old_image);


                }

                $msg =" post update successfully ";
                return $msg;
                header('location: postshow.php');
                }
    else{
        $error = " Some think worng here";
        return $error;
    }



    }



  
  
//    if($_SERVER['REQUEST_METHOD'] == 'POST'){
   

//     $post_title = $_POST['post_title'];
//     $image_one = $_FILES['image_one']['name'];
//     $des_one = $_POST['des_one'];
//     // $des_two = $_POST['des_two'];
//     $post_tags = $_POST['post_tags'];
//     $post_edit = $post->EditPostStore($post_title,$image_one,$des_one,$post_tags,$id,$data);

//  }


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
                                                <label class="form-label">Image One</label>
                                                <?=$prow['Id'] ?>
                                                <input type="file" name="image_one" class="form-control"  />
                                                <input type="hidden" name="image_old" value="<?=$prow['image_one'] ?>" class="form-control"  />
                                              
                                                <img style="width:70px;" src="<?=$prow['image_one'] ?>" alt="">
                                            </div>
                                            <div>
                                                <div>
                                                    <button type="submit" name="submit_image" class="btn btn-primary waves-effect waves-light me-1">
                                                        edit images 
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
                    include_once 'inc/footer.php';
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



