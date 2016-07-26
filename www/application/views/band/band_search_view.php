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
                  <h1 class="page-header">Searching Bands</h1>
               </div>
               <!--End Page Header -->
         </div>
            
         <div class="row">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
               <div class="panel-heading">
                  Bands
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover" id="dataTable">
                        <thead>
                           <tr>
                              <th style="width: 10%;">Photo</th>
                              <th>Name</th>
                              <th>About</th>
                              <th>City</th>
                              <th style="width: 10%;"></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
                              if(!empty($bands))
                                 foreach ($bands as $key) {
                                    $string = strip_tags($key->getAbout());
                                    if (strlen($string) > 80) {
                                       // truncate string
                                       $stringCut = substr($string, 0, 80);
                                       // make sure it ends in a word so assassinate doesn't become ass...
                                       $string = substr($stringCut, 0, strrpos($stringCut, ' '))."...";
                                    }
                                    echo "<tr><td>"
                                    ?>
                                    <img style="width: 75px; height: 75px;" src="<?php echo base_url(); ?>content-uploaded/<?php echo $key->getPhoto(); ?>" alt="<?php echo $key->getPhoto(); ?>">
                                    <?php
                                    echo "</td>";
                                    echo "<td>{$key->getName()}</td>";
                                    echo "<td>{$string}</td>";
                                    echo "<td>{$key->getCity()}</td>";
                                    echo "<td><a href=\"".base_url('bands/profile/'.$key->getIdBand())."\">Profile</a><br><a href=\"".base_url('bands/followBand/'.$key->getIdBand())."\">Follow Me</a></td></tr>";
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