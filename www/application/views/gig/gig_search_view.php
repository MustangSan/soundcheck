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
                    <h1 class="page-header">Searching Gigs</h1>
                </div>
                <!--End Page Header -->
            </div>
            
            <div class="row">
               <!-- Advanced Tables -->
               <div class="panel panel-default">
                  <div class="panel-heading">
                     Gigs
                  </div>
                  <div class="panel-body">
                     <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTable">
                           <thead>
                              <tr>
                                 <th>Description</th>
                                 <th>Place</th>
                                 <th>Date</th>
                                 <th>Country</th>
                                 <th>Estate</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 
                              if(!empty($gigs))
                                 foreach ($gigs as $key) {
                                    $string = strip_tags($key->getDescription());
                                    if (strlen($string) > 70) {
                                       // truncate string
                                       $stringCut = substr($string, 0, 70);
                                       // make sure it ends in a word so assassinate doesn't become ass...
                                       $string = substr($stringCut, 0, strrpos($stringCut, ' '))."...";
                                    }
                                    echo "<tr><td>{$string}</td>";
                                    echo "<td>{$key->getPlace()}</td>";
                                    echo "<td>{$key->getDate()}</td>";
                                    echo "<td>{$key->getCountry()}</td>";
                                    echo "<td>{$key->getEstate()}</td>";
                                    echo "<td><a href=\"".base_url('gigs/details/'.$key->getIdGig())."\">More Details</a></td></tr>";
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