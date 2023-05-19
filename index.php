
<?php

 include_once 'classes/Post.php';
 include_once 'lib/Database.php';
 include_once 'helpers/Format.php';
   $fr = new Format();
 $post = new Post();
?>

<?php
  include_once 'inc/header.php';
?>

  <body>
    

    <div class="wrap">

    <?php
        include_once 'inc/navbar.php';
     ?>

      <section class="site-section py-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="mb-4">Latest Posts</h2>
            </div>
          </div>
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
              <div class="row">
                <?php
                
                 $getpost = $post->LatestPost();
                 if($getpost){
                
                  while($row= mysqli_fetch_assoc($getpost)){
                         
                    
                ?>
                <div class="col-md-6">
                  <a href="sigle_page.php?sigleId=<?=base64_encode($row['Id'])?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img width="400px;" height="200px;" src="<?=$row['image_one']?>" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                      <span class="ml-2 category"><?=$row['catName']?> </span>
                        <span class="mr-2"><?=date('d M Y h:mA',strtotime($row['create_at']))?> </span> &bullet;
                        
                      </div>
                      <h2><?=$row['post_title']?></h2>
                      <p>
                      

                          <?=$fr->textShorten($row['des_one'],60) ?>[read more]
                         
                      </p>
                    </div>
                  </a>
                </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                
                                          
            
              </div>
                                             

           


              

              

            </div>

            <!-- END main-content -->

           <?php
            include 'inc/sidebar.php';
           ?>
            <!-- END sidebar -->

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