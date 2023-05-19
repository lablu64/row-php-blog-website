
<?php

 include_once 'classes/Post.php';
 include_once 'classes/Category.php';
 include_once 'lib/Database.php';
 include_once 'helpers/Format.php';

 if($_GET['catId']){
  $postId = base64_decode($_GET['catId']);
 }

   $fr = new Format();
 $post = new Post();
 $ct = new Category();
?>

<?php
  include_once 'inc/header.php';
?>

  <body>
    

    <div class="wrap">

    <?php
        include_once 'inc/navbar.php';
     ?>



<section class="site-section pt-5">
      <div class="container">
        <div  class="row mb-4">
          <div style="background-color:#dbd8d8; height:150px; " class="col-md-12">   
          <?php
          $rel_post = $post->CategoryPost($postId);
         
            if($rel_post){
              while($rrow= mysqli_fetch_assoc($rel_post)){
            
            
          ?>
            <h2 style="text-align:center; padding:50px 60px;" class="mb-4 ">Category : <?=$rrow['catName']?></h2>
          
            <?php
          }
          }
          ?>
          
          
          </div>
        </div>
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <div class="row mb-5 mt-5">

              <div class="col-md-12">
              <?php
          $rel_post = $post->realPost($postId);
          if($rel_post){
            while($rerow= mysqli_fetch_assoc($rel_post)){
          
          ?>

                <div class="post-entry-horzontal">
                  <a href="sigle_page.php?sigleId=<?=base64_encode($rerow['Id'])?>">
                    <div class="image element-animate" data-animate-effect="fadeIn" style="background-image: url(<?=$rerow['image_one']?>);"></div>
                    <span class="text">
                      <div class="post-meta">
                      <span class="mr-2"><?=$rerow['catName']?></span> &bullet;
                       
                         <span class="mr-2"><?=date('d M Y h:mA',strtotime($rerow['create_at']))?> </span>
                       
                      </div>
                      <h2><?=$rerow['post_title']?></h2>
                    </span>
                  </a>
                </div>

             <?php
               }
             }
             ?>
                <!-- END post -->

              </div>
            </div>

           
         
            

          </div>

          <!-- END main-content -->
        
          
          <!-- END sidebar -->
           <?php
            include 'inc/sidebar.php';
           ?>
         

        </div>
      </div>
    </section>
  
          
         


      
    
    
      <?php
        include_once 'inc/footer.php';
      ?>
      <!-- END footer -->

    </div>
    
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>
    <?php
        include_once 'inc/script.php';
      ?>
  
  </body>
</html>

 


   
