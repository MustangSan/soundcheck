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
                  <h1 class="page-header">My Songs</h1>
               </div>
               <!--End Page Header -->
         </div>
            
         <div class="row">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
               <div class="panel-heading">
                  Songs
                  <a class="create-btn btn btn-default btn-sm" style="float: right;" href="<?php echo base_url('albuns/createSong/'.$idBand.'/'.$idAlbum); ?>">
                     <i class="fa fa-music fa-fw"></i> Create Song
                  </a>
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover" id="dataTable">
                        <thead>
                           <tr>
                              <th style="width: 10%;">Tracks</th>
                              <th>Name</th>
                              <th>Genre</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                           if(!empty($songs))
                              foreach ($songs as $key) {
                                 echo "<tr><td>{$key->getTrackNumber()}</td>";
                                 echo "<td>{$key->getName()}</td>";
                                 echo "<td>{$key->getGenre()}</td>";
                                 echo "<td><a href=\"".base_url('albuns/updateSong/'.$key->getIdSong())."\">Update</a></td></tr>";
                              }
                           ?>
                        </tbody>
                     </table>
                  </div>
                  
                  <div>
                     <a href="<?php echo base_url('albuns/myAlbuns/'.$idBand);?>" class="btn btn-default">Back</a>
                  </div>

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