<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
 
class Category{
   
    public $db;
    public $fr;

    public function __construct(){
        $this->db = new Database();
        $this->fr = new Format();
    }

 public function AddCategory($catName){
    

    $catName = $this->fr->validation($catName);

    if(empty($catName)){
        $msg = "Category Name filde must not be enpty ";
        return $msg;
    }
    else{
                     $select_que = " SELECT * FROM categories WHERE catName='$catName'";
                    $select_re = $this->db->select($select_que);
                        if($select_re >0){
                            $msg =" This category Name is already exsit";
                            return $msg; 
                          
                        }
                      else{
                                $insert_que = "INSERT INTO categories(catName) VALUES('$catName')";
                                $insert_result= $this->db->insert($insert_que);

                                    if($insert_result){

                                        $msg =" cateogry insert successfully ";
                                        return $msg;
                                        }
                            else{
                                $error = " Some think worng here";
                                return $error;
                            }

                    }
    }
 
    
 }
//select all category
public function AllCategory(){
    $select_cat = "SELECT * FROM categories";
    $all_cat = $this->db->select( $select_cat);
    if($all_cat != false){
        return $all_cat;
    }
    else{
        return false;
    }
}

//edit category

public function getEdit($id){
    $edit_que =  "SELECT * FROM categories WHERE catId='$id'";
    $edit_result= $this->db->select($edit_que);
    return $edit_result;
}
//update category

public function UpdateCategory($catName,$id){
    $catName = $this->fr->validation($catName);

    if(empty($catName)){
        $msg = "Category Name filde must not be enpty ";
        return $msg;
    }
    else{
                     $select_que = " SELECT * FROM categories WHERE catName='$catName'";
                    $select_re = $this->db->select($select_que);
                        if($select_re >0){
                            $msg =" This category Name is already exsit";
                            return $msg; 
                          
                        }
                      else{
                                $update_que = "UPDATE  categories SET  catName='$catName' WHERE catId='$id'";
                                $update_result= $this->db->insert($update_que);

                                    if($update_result){
                                        header('location:categoryshow.php');

                                        $msg =" cateogry update successfully ";
                                        return $msg;
                                        
                                        }
                            else{
                                $error = " Some think worng here";
                                return $error;
                            }

                    }
    }

}


//delete category

public function DeleteCategory($id){
    $delete_que = "DELETE FROM categories WHERE catId='$id'";
    $delete_result= $this->db->delete($delete_que);

        if($delete_result){

            $msg =" delete successufuly ok  ";
            return $msg;
            }

}
//category page category name select 

// public function CatName($id)
// {
//     $catName_select_que = "SELECT * FROM categories WHERE catId ='$id'";
//     $catName_select = $this->db->select( $catName_select_que);
//     return $catName_select;
// }



//meta decription


 //select all category
public function AllmetaDes(){
    $select_cat = "SELECT * FROM  metadecriptions";
    $all_cat = $this->db->select( $select_cat);
    if($all_cat != false){
        return $all_cat;
    }
    else{
        return false;
    }
}


 //meta edit category

public function metaEdit($metaId){
    $edit_que =  "SELECT * FROM  metadecriptions WHERE metaId='$metaId'";
    $edit_result= $this->db->select($edit_que);
    return $edit_result;
}
//metaupdate category

public function UpdateMeta($meta_des,$metaId){
    $meta_des = $this->fr->validation($meta_des);

    if(empty($meta_des)){
        $msg = "meta description Name filde must not be enpty ";
        return $msg;
    }
    else{
                     $select_que = " SELECT * FROM  metadecriptions WHERE meta_des='$meta_des'";
                    $select_re = $this->db->select($select_que);
                        if($select_re >0){
                            $msg =" This meta description Name is already exsit";
                            return $msg; 
                          
                        }
                      else{
                                $update_que = "UPDATE   metadecriptions SET  meta_des='$meta_des' WHERE metaId='$metaId'";
                                $update_result= $this->db->insert($update_que);

                                    if($update_result){
                                        
                                        $msg =" meta description update successfully ";
                                        return $msg;
                                        
                                        }
                            else{
                                $error = " Some think worng here";
                                return $error;
                            }

                    }
    }

}


}

?>