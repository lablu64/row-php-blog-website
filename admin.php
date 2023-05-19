 <?php
   include_once 'include/header.php';
   include_once 'include/sidebar.php';
   if(!empty($_SESSION['user_id'])){ 

 ?>
          
            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Dashboard</h4>

                                   

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            
                        </div> <!-- end row-->

                  


                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

   <?php
    include_once 'include/footer.php';
   ?>

           <?php
                        }
                        else{
                            header("location: login.php"); 
                        }
               ?>