<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
   $this->load->view('pages/header');
?>

<body>
   <!--  wrapper -->
   <div id="wrapper">
      <?php
         $this->load->view('pages/top-menu');
         $this->load->view('pages/side-menu');
      ?>

      <!--  page-wrapper -->
      <div id="page-wrapper">

         <div class="row">
               <!-- Page Header -->
               <div class="col-lg-12">
                  <h1 class="page-header"><?php echo $post->getTitle(); ?></h1>
               </div>
               <!--End Page Header -->
         </div>
            
         <div class="row">
            <div class="col-md-6">
               <img style="width: 500px; height: auto; margin-bottom: 25px;" src="<?php echo base_url(); ?>content-uploaded/<?php echo $post->getFeaturedImage(); ?>" alt="<?php echo $post->getFeaturedImage(); ?>">
               <?php 
                  echo "<p>{$post->getContent()}</p>";

                  echo "<br /><p>Date: {$post->getDate()}</p>";
               ?>
         </div>

      </div>
      <!-- end page-wrapper -->

   </div>
   <!-- end wrapper -->
<?php
   $this->load->view('pages/footer');
?>