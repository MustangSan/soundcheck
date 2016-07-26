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
                  <h1 class="page-header">My Posts</h1>
               </div>
               <!--End Page Header -->
         </div>
            
         <div class="row">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
               <div class="panel-heading">
                  Posts
                  <a class="create-btn btn btn-default btn-sm" style="float: right;" href="<?php echo base_url('posts/createPost/'.$idBand); ?>">
                     <i class="fa fa-music fa-fw"></i> Create Post
                  </a>
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover" id="dataTable">
                        <thead>
                           <tr>
                              <th>Title</th>
                              <th>Content</th>
                              <th>Date</th>
                              <th>Status</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              if(!empty($posts))
                                 foreach ($posts as $key) {
                                    $string = strip_tags($key->getContent());
                                    if (strlen($string) > 80) {
                                       // truncate string
                                       $stringCut = substr($string, 0, 80);
                                       // make sure it ends in a word so assassinate doesn't become ass...
                                       $string = substr($stringCut, 0, strrpos($stringCut, ' '))."...";
                                    }
                                    echo "<tr><td>{$key->getTitle()}</td>";
                                    echo "<td>{$string}</td>";
                                    echo "<td>{$key->getDate()}</td>";
                                    echo "<td>{$key->getStatus()}</td>";
                                    echo "<td><a href=\"".base_url('posts/updatePost/'.$key->getIdPost())."\">Update</a><br /><a href=\"".base_url('posts/readPost/'.$key->getIdPost())."\">Read Post</a></td></tr>";
                                 }
                           ?>
                        </tbody>
                     </table>
                  </div>

                  <a href="<?php echo base_url('bands/editProfile/'.$idBand);?>" class="btn btn-default">Back</a>
               </div>
            </div>
            <!--End Advanced Tables -->
         </div>

      </div>
      <!-- end page-wrapper -->

   </div>
   <!-- end wrapper -->
<?php
   $this->load->view('pages/footer');
?>
