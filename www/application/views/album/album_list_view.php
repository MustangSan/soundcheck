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
                  <h1 class="page-header">My Albuns</h1>
               </div>
               <!--End Page Header -->
         </div>
            
         <div class="row">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
               <div class="panel-heading">
                  Albuns
                  <a class="create-btn btn btn-default btn-sm" style="float: right;" href="<?php echo base_url('albuns/createAlbum/'.$idBand); ?>">
                     <i class="fa fa-music fa-fw"></i> Create Album
                  </a>
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover" id="dataTable">
                        <thead>
                           <tr>
                              <th>Cover Art</th>
                              <th>Name</th>
                              <th>Genre</th>
                              <th>Release Date</th>
                              <th>Label</th>
                              <th>Copyright Date</th>
                              <th>Seller Link</th>
                              <th>Listening Link</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              if(!empty($albuns))
                                 foreach ($albuns as $key) {
                                    echo "<tr><td>"
                                    ?>
                                    <img style="width: 75px; height: 75px;" src="<?php echo base_url(); ?>content-uploaded/<?php echo $key->getCoverArt(); ?>" alt="<?php echo $key->getCoverArt(); ?>">
                                    <?php
                                    echo "</td>";
                                    echo "<td>{$key->getName()}</td>";
                                    echo "<td>{$key->getGenre()}</td>";
                                    echo "<td>{$key->getReleaseDate()}</td>";
                                    echo "<td>{$key->getLabel()}</td>";
                                    echo "<td>{$key->getCopyrightDate()}</td>";
                                    echo "<td>{$key->getSellerLink()}</td>";
                                    echo "<td>{$key->getListeningLink()}</td>";
                                    echo "<td><a href=\"".base_url('albuns/updateAlbum/'.$key->getIdAlbum())."\">Update</a><br>";
                                    echo "<a href=\"".base_url('albuns/myAlbumSongs/'.$idBand.'/'.$key->getIdAlbum())."\">Album Songs</a></td></tr>";
                                 }
                           ?>
                        </tbody>
                     </table>
                  </div>
                  
                  <div>
                     <a href="<?php echo base_url('bands/editProfile/'.$idBand);?>" class="btn btn-default">Back</a>
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