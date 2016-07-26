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
                  <h1 class="page-header">My Gigs</h1>
               </div>
               <!--End Page Header -->
         </div>
            
         <div class="row">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
               <div class="panel-heading">
                  Gigs
                  <a class="create-btn btn btn-default btn-sm" style="float: right;" href="<?php echo base_url('gigs/createGig'); ?>">
                     <i class="fa fa-volume-up fa-fw"></i> Create Gig
                  </a>
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover" id="dataTable">
                        <thead>
                           <tr>
                              <th>Description</th>
                              <th>Place</th>
                              <th>Date</th>
                              <th>Estate</th>
                              <th>City</th>
                              <th>Status</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              if(!empty($gigs))
                                 foreach ($gigs as $key) {
                                    echo "<tr><td>{$key->getDescription()}</td>";
                                    echo "<td>{$key->getPlace()}</td>";
                                    echo "<td>{$key->getDate()}</td>";
                                    echo "<td>{$key->getEstate()}</td>";
                                    echo "<td>{$key->getCity()}</td>";
                                    echo "<td>{$key->getStatus()}</td>";
                                    echo "<td><a href=\"".base_url('gigs/updateGig/'.$key->getIdGig())."\">Update</a><br/><a href=\"".base_url('gigs/details/'.$key->getIdGig())."\">Details</a></td></tr>";
                                 }
                           ?>
                        </tbody>
                     </table>
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