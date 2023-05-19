<?php
session_start();

include_once '../lib/Database.php';
include_once '../helpers/Format.php';


class Login{
            public $db;
            public $fr;

            public function __construct(){
                $this->db = new Database();
                $this->fr = new Format();
            }

         public function loginUser($data){
          if(empty( $_SESSION['user_id'])){
            
          }


            if(isset($_POST['email']) && isset($_POST['password'])  ){
                
            $email = $this->fr->validation($data['email']);
            $password = $this->fr->validation($data['password']);
            

            
            if( empty($email) || empty($password) ){
                $error ="Fild Must not be empty";
                return $error;
            }
            else{
                    $e_query = " SELECT userId  FROM users WHERE email='$email' AND password='$password'";
                    $logincheck = $this->db->select($e_query);
                        if(mysqli_num_rows($logincheck)  ){

                             $data = mysqli_fetch_assoc($logincheck);
                             $userId = $data['userId '];
                             $_SESSION['user_id'] =$userId;

                            // $_SESSION['user'] =$logincheck;
                            header("location: admin/categoryadd.php");
                        }
                        else{
                            $error = "Data not match Please try again ";
                             return $error;

                        }


                    //   else{
                    //             $insert_query = "INSERT INTO users(name,email,password,v_token) VALUES('$name','$email','$password','$v_token')";
                    //             $insert_row = $this->db->insert($insert_query);

                    //                 if($insert_row){

                    //                     $success ="Resistration successfull Please check your email inbox for varifi email";
                    //                     return $success;
                    //                     }
                    //         else{
                    //             $error = "resigter failed";
                    //             return $error;
                    //         }

                    // }
            }
            }


                
        }

 }
?>