<?php
 error_reporting(0);
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/Category.php');
include_once ($filepath.'/../classes/Post.php');

$post = new Post();
if($_GET['post_title']){
  $postId = $_GET['post_title'];
 }


$ct = new Category();

  $allmeta = $ct->AllmetaDes();


?>


<!doctype html>
<html lang="en">
  <head>
    
                                      <?php 
                                      
                                       $allPost = $post->SiglePost($postId);
                                                
                                                if($allPost){
                                                    
                                                    while($row= mysqli_fetch_assoc($allPost)){
                                                           
                                                        ?>
                                             <title> Antaranga Dot Com Limited-<?=$row['post_title']?> </title>
   
                                                                                
                                                 <?php
                                                      }
                                                    }
                                                  ?>
    



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- meta description start  -->
    
    <?php 
                                                
       if($allmeta){
                                                                                      
       while($row= mysqli_fetch_assoc($allmeta)){
                                                                                               
         ?>
     <meta name="description" content="<?=$row['meta_des']?>">
                                       
        <?php
             }
           }
         ?>
    <!-- <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet"> -->
    <link rel="shortcut icon" href="upload/logo.png">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
  
    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <header role="banner">
        <div class="top-bar">
          <div class="container">
            <div class="row">
              <div class="col-9 social">
                <a href="https://twitter.com/antarangadotcom"><span class="fa fa-twitter"></span></a>
                <a href="https://www.facebook.com/AntarangaDotCom"><span class="fa fa-facebook"></span></a>
                <a href="https://www.linkedin.com/company/antaranga-dot-com"><span class="fa fa-linkedin"></span></a>
                <a href="https://www.antbd.com/index.php"><span class="fa fa-pinterest"></span></a>
              </div>
              <div class="col-3 search-top">
                <!-- <a href="#"><span class="fa fa-search"></span></a> -->
                <form action="#" class="search-top-form">
                  <span class="icon fa fa-search"></span>
                  <input type="text" id="s" placeholder="Type keyword to search...">
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="container logo-wrap">
          <div class="row pt-5">
            <div class="col-12 text-center">
              <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
              <h1 class="site-logo"><a href="index.php">AnT BD Blogs </a></h1>
            </div>
          </div>
        </div>
        
        <nav class="navbar navbar-expand-md  navbar-light bg-light">
          <div class="container">
            
           
            <div class="collapse navbar-collapse" id="navbarMenu">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="index.php">Home</a>
                </li>
              

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="category.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown05">
                  <?php
                     $allcat = $ct->AllCategory();
                      if($allcat){
                      
                        while($row= mysqli_fetch_assoc($allcat)){
                              
                    
                ?>
                    <a class="dropdown-item" href="category.php?catId=<?=base64_encode($row['catId'])?>"><?=$row['catName']?></a>
                        
                                               <?php
                                                    }
                                                }
                                                ?>                         
                    
                  </div>

                </li>
                
                
              </ul>
              
            </div>
          </div>
        </nav>
</header>
<div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                           
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="aboutus.php">About</a></li>
                            <li><a href="package.php">Package</a></li>
                            <li><a href="coverage.php">Coverage</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <!-- <li><a href="http://dhakamovie.com" target="_blank">FTP</a></li> -->
                        </ul>
                    </div>

