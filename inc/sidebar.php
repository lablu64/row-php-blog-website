<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/Post.php');


$pt= new Post();

?>


<div class="col-md-12 col-lg-4 sidebar">
              <div class="sidebar-box search-form-wrap">
                <form action="#" class="search-form">
                  <div class="form-group">
                    <span class="icon fa fa-search"></span>
                    <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                  </div>
                </form>
              </div>
              <!-- END sidebar-box -->
              <!-- <div class="sidebar-box">
                <div class="bio text-center">
                  <img src="images/person_1.jpg" alt="Image Placeholder" class="img-fluid">
                  <div class="bio-body">
                    <h2>David Craig</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga sit molestias minus.</p>
                    <p><a href="#" class="btn btn-primary btn-sm rounded">Read my bio</a></p>
                    <p class="social">
                      <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                    </p>
                  </div>
                </div>
              </div> -->
              <!-- END sidebar-box -->  
              <div class="sidebar-box">
                <h3 class="heading">Popular Posts</h3>
                <div class="post-entry-sidebar">
                  <ul>
                    <?php
                    $p_post = $pt->peoplePost();
                    if($p_post){
                      
                      while($prow= mysqli_fetch_assoc($p_post)){
                          
                    
                    ?>
                   
                    <li>
                      <a href="sigle_page.php?sigleId=<?=base64_encode($prow['Id'])?>">
                        <img src="<?=$prow['image_one']?>" alt="<?=$prow['post_title']?>" class="mr-4">
                        <div class="text">
                          <h4><?=$prow['post_title']?></h4>
                          <div class="post-meta">
                            <span class="mr-2"><?=date('d M Y h:mA',strtotime($prow['create_at']))?></span>
                          </div>
                        </div>
                      </a>
                    </li>
                     <?php
                           }
                          }
                      ?>
          
          
                   
                  </ul>
                </div>
              </div>
              <!-- END sidebar-box -->

              <div class="sidebar-box">
                <h3 class="heading">Categories</h3>
                <ul class="categories">
                <?php
                      $allcat = $ct->AllCategory();
                      if($allcat){
                      
                        while($row= mysqli_fetch_assoc($allcat)){
                              
                    
                ?>
                 <li><a href="category.php?catId=<?=base64_encode($row['catId'])?>"> <?=$row['catName']?> </a></li>
                    
                        
                                               <?php
                                                    }
                                                }
                                                ?>
                 
                
                </ul>
              </div>
              <!-- END sidebar-box -->

              
            </div>