<?php

include_once '../lib/Database.php';
include_once '../helpers/Format.php';


class Resigter{
            public $db;
            public $fr;

            public function __construct(){
                $this->db = new Database();
                $this->fr = new Format();
            }

         public function AddUser($data){


            $name = $this->fr->validation($data['name']);
            $email = $this->fr->validation($data['email']);
            $password = $this->fr->validation($data['password']);
            $v_token = md5(rand());

            
            if(empty($name) || empty($email) || empty($password) ){
                $error ="Fild Must not be empty";
                return $error;
            }
            else{
                    $e_query = " SELECT * FROM users WHERE email='$email'";
                    $check_email = $this->db->select($e_query);
                        if($check_email >0){
                            $error =" This email is already exsit";
                            return $error; 
                            header("location:login.php");
                        }
                      else{
                                $insert_query = "INSERT INTO users(name,email,password,v_token) VALUES('$name','$email','$password','$v_token')";
                                $insert_row = $this->db->insert($insert_query);

                                    if($insert_row){

                                        $success ="Resistration successfull Please check your email inbox for varifi email";
                                        return $success;
                                        }
                            else{
                                $error = "resigter failed";
                                return $error;
                            }

                    }
            }

        }

 }
?>