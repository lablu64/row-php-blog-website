<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/Category.php');
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Post{
    public $db;
    public $fr;

    public function __construct(){
        $this->db = new Database();
        $this->fr = new Format();
    }

 public function AddPost($data,$file){
    $post_title = $this->fr->validation($data['post_title']);
    $catId = $this->fr->validation($data['catId']);
     $des_one = $this->fr->validation($data['des_one']);
    //  $des_two = $this->fr->validation($data['des_two']);
    // $postType = $this->fr->validation($data['postType']);
    $post_tags = $this->fr->validation($data['post_tags']);

    $permited = array('jpg','jpeg','png','gif');
    $file_name = $file['image_one']['name'];
    $file_size = $file['image_one']['size'];
    $file_temp = $file['image_one']['tmp_name'];
   $div = explode('.', $file_name);
   $file_ext = strtolower(end($div));
   $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
   $upload_image = "upload/".$unique_image;


//    $permited_two = array('jpg','jpeg','png','gif');
//    $file_name_two = $file['image_two']['name'];
//    $file_size_two = $file['image_two']['size'];
//    $file_temp_two = $file['image_two']['tmp_name'];
//   $div_two = explode('.', $file_name_two);
//   $file_ext_two = strtolower(end($div_two));
//   $unique_image_two = substr(md5(rand().time()),0,10).'.'.$file_ext_two;
//   $upload_image_two = "upload/".$unique_image_two;

  if(empty($post_title) || empty($catId ) || empty($des_one) || empty($post_tags)  ){
    $msg = "post  filed must not be enpty ";
    return $msg;
}
elseif($file_size > 1048567){
    $msg = "File Size must be less than 1 MB ";
    return $msg;

}
// elseif($file_size_two > 1048567){
//     $msg = "File Size must be less than 1 MB ";
//     return $msg;

// }

// elseif(in_array($file_ext_two,$permited_two) == false){
//     $msg = "You can updoad Only:-". implode(',',$permited_two);
//     return $msg;

// }
elseif(in_array($file_ext,$permited) == false){
    $msg = "You can updoad Only:-". implode(',',$permited);
    return $msg;

}

else{
     move_uploaded_file($file_temp,$upload_image);
    //  move_uploaded_file($file_temp_two,$upload_image_two);
      

                            $insert_que = " INSERT INTO `posts`( `post_title`, `catId`,`image_one`,`des_one`,`post_tags`) VALUES ('$post_title','$catId','$upload_image','$des_one','$post_tags')";
                            $insert_result= $this->db->insert($insert_que);

                                if($insert_result){

                                    $msg =" post insert successfully ";
                                    return $msg;
                                    }
                        else{
                            $error = " Some think worng here";
                            return $error;
                        }

                }
}

//all post select

public function GetAllPost(){
    $select_post = "SELECT posts.*, categories.catName FROM posts INNER JOIN categories ON posts.catId=categories.catId";
    $all_post = $this->db->select( $select_post);
    return $all_post;
 
}

//view show models post select

public function ModelData(){
    $model_post = "SELECT posts.*, categories.catName FROM posts INNER JOIN categories ON posts.catId=categories.catId";
    $model_view_post = $this->db->select( $model_post);
    return $model_view_post;
 
}

//active status

public function Active($aid){
    $active_status_update = "UPDATE posts SET status='1' WHERE Id='$aid'";
    $active_update_result = $this->db->update( $active_status_update);
   
            if($active_update_result){

                $msg =" post active successfully ";
                return $msg;
                }
            else{
            $error = " Some think worng here";
            return $error;
            }
}

//deactive status

public function DeActive($deid){
    $deactive_status_update = "UPDATE posts SET status='0' WHERE Id='$deid'";
    $deactive_update_result = $this->db->update( $deactive_status_update);
   

    if($deactive_update_result){

        $msg =" post deactive successfully ";
        return $msg;
        }
    else{
    $error = " Some think worng here";
    return $error;
    }
}

//edit post get

public function EditPost($id){
    $edit_post = "SELECT * FROM posts WHERE posts.Id='$id' ";
    $edit_result = $this->db->select( $edit_post);
    return $edit_result;

}
//edit post store 

public function EditPostStore($post_title,$image_one,$des_one,$post_tags,$id,$data){
    $post_title = $_POST['post_title'];
    $image_one = $_FILES['image_one']['name'];
    // $catId = $this->fr->validation($data['catId']);
     $des_one = $_POST['des_one'];
    //  $des_two = $_POST['des_two'];
     $post_tags = $_POST['post_tags'];

    $permited = array('jpg','jpeg','png','gif');
    $file_name = $_FILES['image_one']['name'];
    $file_size = $_FILES['image_one']['size'];
    $file_temp = $_FILES['image_one']['tmp_name'];
   $div = explode('.', $file_name);
   $file_ext = strtolower(end($div));
   $unique_image = substr(md5(time()),0,10).'.'.$file_ext;
   $upload_image = "upload/".$unique_image;



  if(empty($post_title)  ){
    $msg = "post  filed must not not be enpty ";
    return $msg;
}
else{
    if(!empty($file_name) || !empty($file_ext_two)){
        if($file_size > 1048567){
            $msg = "File Size must be less than 1 MB ";
            return $msg;
        
        }
      
        elseif(in_array($file_ext,$permited) == false){
            $msg = "You can updoad Only:-". implode(',',$permited);
            return $msg;
        
        }
        
        else{
             move_uploaded_file($file_temp,$upload_image);
             
        
               $insert_que = " UPDATE `posts` SET `post_title`='$post_title',`image_one`='$upload_image',`des_one`='$des_one',`post_tags`='$post_tags' WHERE Id='$id' ";
                 $insert_result= $this->db->insert($insert_que);
        
                   if($insert_result){
        
                           $msg =" post update successfully ";
                              return $msg;
                             }
                     else{
                            $error = " Some think worng here";
                              return $error;
                          }
        
             }

    }
  else{
        $insert_que = " UPDATE `posts` SET `post_title`='$post_title',`des_one`='$des_one',`post_tags`='$post_tags' WHERE Id='$id' ";
        $insert_result= $this->db->insert($insert_que);

            if($insert_result){

                $msg =" post update successfully ";
                return $msg;
                }
    else{
        $error = " Some think worng here";
        return $error;
    }

    }
}

            

       
            
         


}

//post delete start 

public function DeletePost($id)
{
    $img_post = "SELECT * FROM posts WHERE posts.Id='$id' ";
    $img_result = $this->db->select( $img_post);
    if($img_result){
        while($img= mysqli_fetch_assoc($img_result)){
            $imgOne = $img['image_one'];
            unlink($imgOne);
            $imgtwo = $img['image_two'];
            unlink($imgtwo);

        }
    }

    $delete_que = "DELETE FROM posts WHERE Id='$id'";
    $delete_result= $this->db->delete($delete_que);

        if($delete_result){

            $msg =" delete successufuly ok  ";
            return $msg;
            }
}


//forntend latepost show

 public function LatestPost()
{
    $latest_post = "SELECT posts.*, categories.catName FROM posts INNER JOIN categories ON posts.catId=categories.catId   ORDER BY posts.Id DESC";
    $latest_view_post = $this->db->select($latest_post);
    return $latest_view_post;
    
}

//people post 

public function peoplePost()
{
    $p_post = "SELECT * FROM posts ORDER BY posts.Id DESC LIMIT 5";
    $p_view_post = $this->db->select($p_post);
    return $p_view_post;
}
//pagination page 

public function numPost(){
    $post_que = "SELECT * FROM posts";
    $post = $this->db->select( $post_que);
    return $post;

}

//category count page 

public function catNum($id){
    $c_que = "SELECT * FROM posts WHERE posts.carId ='$id'";
    $c = $this->db->select( $c_que);
    return $c;

}

 public function SiglePost($postId)
{
    $sigle_post = "SELECT posts.*, categories.catName FROM posts INNER JOIN categories ON posts.catId=categories.catId WHERE posts.Id='$postId' ";
    $sigle_result = $this->db->select( $sigle_post);
    return $sigle_result;
}
//realtion post

public function realPost($id)
{
    $re_post = "SELECT posts.*, categories.catName FROM posts INNER JOIN categories ON posts.catId=categories.catId WHERE posts.catId='$id' ORDER BY posts.Id DESC LIMIT 3 ";
    $re_result = $this->db->select( $re_post);
    return $re_result;
}

//category relation post

public function CategoryPost( $id)
{
    
    $re_post = "SELECT posts.*, categories.catName FROM posts INNER JOIN categories ON posts.catId=categories.catId WHERE posts.catId='$id' ORDER BY posts.Id DESC LIMIT 1 ";
    $re_result = $this->db->select( $re_post);
    return $re_result;
    
}




 }

?>