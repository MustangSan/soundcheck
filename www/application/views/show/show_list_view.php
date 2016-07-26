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
                  <?php 
                     if($this->uri->segment(1) == "shows") {
                  ?>
                        <h1 class="page-header">My Shows</h1>
                  <?php
                     }
                     else if($this->uri->segment(1) == "tours") { 
                  ?>
                        <h1 class="page-header">My Tour Shows</h1>
                  <?php 
                     } 
                  ?>
               </div>
               <!--End Page Header -->
         </div>
            
         <div class="row">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
               <div class="panel-heading">
                  Shows
                  <?php 
                     if($this->uri->segment(1) == "shows") {
                  ?>
                        <a class="create-btn btn btn-default btn-sm" style="float: right;" href="<?php echo base_url('shows/createShow/'.$idBand); ?>"><i class="fa fa-music fa-fw"></i> Create Show</a>
                  <?php
                     }
                     else if($this->uri->segment(1) == "tours") { 
                  ?>
                        <a class="create-btn btn btn-default btn-sm" style="float: right;" href="<?php echo base_url('tours/createShow/'.$idBand.'/'.$idTour); ?>"><i class="fa fa-music fa-fw"></i> Create Show</a>
                  <?php 
                     } 
                  ?>
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover" id="dataTable">
                        <thead>
                           <tr>
                           <th>Name</th>
                           <th>Description</th>
                           <th>Date</th>
                           <th>Timetable</th>
                           <th>Place</th>
                           <th></th>
                        </tr>
                        </thead>
                        <tbody>
                           <?php
                              if(!empty($shows))
                                 foreach ($shows as $key) {
                                    echo "<tr><td>{$key->getName()}</td>";
                                    echo "<td>{$key->getDescription()}</td>";
                                    echo "<td>{$key->getDate()}</td>";
                                    echo "<td>{$key->getTimetable()}</td>";
                                    echo "<td>{$key->getPlace()}</td>";
                                    if($this->uri->segment(1) == "shows")
                                       echo "<td><a href=\"".base_url('shows/updateShow/'.$key->getIdShow())."\">Update</a></td></tr>";
                                    else if($this->uri->segment(1) == "tours")
                                       echo "<td><a href=\"".base_url('tours/updateShow/'.$key->getIdShow())."\">Update</a></td></tr>";
                                 }
                           ?>
                        </tbody>
                     </table>
                  </div>

                  <div>
                     <?php 
                        if($this->uri->segment(1) == "shows") {
                     ?>
                           <a href="<?php echo base_url('bands/editProfile/'.$idBand);?>" class="btn btn-default">Back</a>
                     <?php
                        }
                        else if($this->uri->segment(1) == "tours") {
                     ?>
                           <a href="<?php echo base_url('tours/myTours/'.$idBand);?>" class="btn btn-default">Back</a>
                     <?php 
                        } 
                     ?>
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