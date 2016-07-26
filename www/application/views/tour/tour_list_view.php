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
                  <h1 class="page-header">My Tours</h1>
               </div>
               <!--End Page Header -->
         </div>
            
         <div class="row">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
               <div class="panel-heading">
                  Tours
                  <a class="create-btn btn btn-default btn-sm" style="float: right;" href="<?php echo base_url('tours/createTour/'.$idBand); ?>">
                     <i class="fa fa-music fa-fw"></i> Create Tour
                  </a>
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover" id="dataTable">
                        <thead>
                           <tr>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Begin Date</th>
                              <th>End Date</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              if(!empty($tours))
                                 foreach ($tours as $key) {
                                    echo "<tr><td>{$key->getName()}</td>";
                                    echo "<td>{$key->getDescription()}</td>";
                                    echo "<td>{$key->getBeginDate()}</td>";
                                    echo "<td>{$key->getEndDate()}</td>";
                                    echo "<td><a href=\"".base_url('tours/updateTour/'.$key->getIdTour())."\">Update</a><br>";
                                    echo "<a href=\"".base_url('tours/myTourShows/'.$idBand.'/'.$key->getIdTour())."\">Tour Shows</a></td></tr>";
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