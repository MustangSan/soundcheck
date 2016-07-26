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
                  <h1 class="page-header">My Venues</h1>
               </div>
               <!--End Page Header -->
         </div>
            
         <div class="row">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
               <div class="panel-heading">
                  Venues
                  <a class="create-btn btn btn-default btn-sm" style="float: right;" href="<?php echo base_url('venues/createVenue'); ?>">
                     <i class="fa fa-home fa-fw"></i> Create Venue
                  </a>
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover" id="dataTable">
                        <thead>
                           <tr>
                              <th>Name</th>
                              <th>About</th>
                              <th>City</th>
                              <th>Phone</th>
                              <th>Contact Email</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              if(!empty($venues))
                                 foreach ($venues as $key) {
                                    $string = strip_tags($key->getAbout());
                                    if (strlen($string) > 80) {
                                       // truncate string
                                       $stringCut = substr($string, 0, 80);
                                       // make sure it ends in a word so assassinate doesn't become ass...
                                       $string = substr($stringCut, 0, strrpos($stringCut, ' '))."...";
                                    }
                                    echo "<tr><td>{$key->getName()}</td>";
                                    echo "<td>{$string}</td>";
                                    echo "<td>{$key->getCity()}</td>";
                                    echo "<td>{$key->getPhone()}</td>";
                                    echo "<td>{$key->getContactEmail()}</td>";
                                    echo "<td><a href=\"".base_url('venues/updateVenue/'.$key->getIdVenue())."\">Update</a><br/><a href=\"".base_url('venues/editProfile/'.$key->getIdVenue())."\">Profile</a></td></tr>";
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