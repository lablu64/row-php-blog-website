<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');
 
class Password{
   
    public $db;
    public $fr;

    public function __construct(){
        $this->db = new Database();
        $this->fr = new Format();
    }

//edit category

public function getEdit($id){
    $edit_que =  "SELECT * FROM users WHERE userId='$id'";
    $edit_result= $this->db->select($edit_que);
    return $edit_result;
}
//update category

public function updatepas($email,$password,$id){
    $email = $this->fr->validation($email);
    $password = $this->fr->validation($password);
   


    if(empty($email)){
        $msg = " email filde must not be enpty ";
        return $msg;
    }
    if(empty($password)){
        $msg = " password filde must not be enpty ";
        return $msg;
    }
    else{
                     $select_que = " SELECT * FROM users WHERE email='$email' AND password='$password'";

                    $select_re = $this->db->select($select_que);
                        if($select_re >0){
                            $msg =" This  Name is already exsit";
                            return $msg; 
                          
                        }
                      else{
                        
                                $update_que = "UPDATE  users SET  email='$email',password='$password' WHERE userId='$id'";
                                $update_result= $this->db->insert($update_que);

                                    if($update_result){
                                        header('location:categoryshow.php');

                                        $msg =" users email and password updated successfully ";
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