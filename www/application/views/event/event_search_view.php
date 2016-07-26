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
                    <h1 class="page-header">Searching Events</h1>
                </div>
                <!--End Page Header -->
            </div>
            
            <div class="row">
               <!-- Advanced Tables -->
               <div class="panel panel-default">
                  <div class="panel-heading">
                     Events
                  </div>
                  <div class="panel-body">
                     <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTable">
                           <thead>
                              <tr>
                                 <th>Name</th>
                                 <th>Place</th>
                                 <th>Date</th>
                                 <th>Country</th>
                                 <th>Estate</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 
                                 if(!empty($events))
                                    foreach ($events as $key) {
                                       echo "<tr><td>{$key->getName()}</td>";
                                       echo "<td>{$key->getPlace()}</td>";
                                       echo "<td>{$key->getDate()}</td>";
                                       echo "<td>{$key->getCountry()}</td>";
                                       echo "<td>{$key->getEstate()}</td>";
                                       echo "<td><a href=\"".base_url('events/profile/'.$key->getIdEvent())."\">Profile</a></td></tr>";
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