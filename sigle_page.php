
<?php

 include_once 'classes/Post.php';
 include_once 'classes/Category.php';
 include_once 'lib/Database.php';
 include_once 'helpers/Format.php';

 if($_GET['sigleId']){
  $postId = base64_decode($_GET['sigleId']);
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


<section class="site-section py-lg">
      <div class="container">
        
        <div class="row blog-entries element-animate">
          <?php
          
          $getpost = $post->SiglePost($postId);

           
       
           if($getpost){
           
                         while($srow= mysqli_fetch_assoc($getpost)){
                                                
                       ?>
                       

          <div class="col-md-12 col-lg-8 main-content">
                      <img style=" height:536px; width:800px;" src="<?=$srow['image_one']?>" alt="<?=$srow['post_title']?>" class="img-fluid mb-5">
                      <div class="post-meta">
                                <a class="category mb-5" href="#"><?=$srow['catName']?></a>
                                  <span class="mr-2"><?=date('d M Y h:mA',strtotime($srow['create_at']))?> </span>
                                
                                </div>
                      <h1 class="mb-4"><?=$srow['post_title']?></h1>
                                        
                      <div class="post-content-body"><?=$srow['des_one']?></div>

      
          </div>

      
          <!-- END main-content -->
          <?php
            include 'inc/sidebar.php';
           ?>
          
          <!-- END sidebar -->

        </div>
      </div>
    </section>

    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="mb-3 ">Related Post</h2>
          </div>
        </div>
        <div class="row">
          <?php
          $rel_post = $post->realPost($srow['catId']);
          if($rel_post){
            while($rerow= mysqli_fetch_assoc($rel_post)){
          
          ?>
         
          <div class="col-md-6 col-lg-4">
            <a href="sigle_page.php?sigleId=<?=base64_encode($rerow['Id'])?>" class="a-block sm d-flex align-items-center height-md" style="background-image: url('<?=$rerow['image_one']?>'); ">
              <div class="text">
                <div class="post-meta">
                  <span class="category"><?=$rerow['catName']?></span>
                  <span class="mr-2"><?=date('d M Y h:mA',strtotime($rerow['create_at']))?> </span> &bullet;
                 </div>
                <h3><?=$rerow['post_title']?></h3>
              </div>
            </a>
          </div>
          <?php
            }
          }
          ?>
         
          
        </div>
      </div>


    </section>
    <!-- END section -->

             
          <?php
                 }
               }
          ?>


      
    
    
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