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
                  <h1 class="page-header">My Members</h1>
               </div>
               <!--End Page Header -->
         </div>
            
         <div class="row">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
               <div class="panel-heading">
                  Members
                  <div class="btn-group pull-right">
                     <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                       <i class="fa fa-chevron-down"></i>
                     </button>
                     <ul class="dropdown-menu slidedown">
                        <li>
                           <a href="<?php echo base_url('members/createMember/'.$idBand); ?>">
                              <i class="fa fa-plus fa-fw"></i> Create Member
                           </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                           <a href="<?php echo base_url('members/insertMember/'.$idBand); ?>">
                              <i class="fa fa-level-up fa-fw"></i> Insert Member
                           </a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-bordered table-hover" id="dataTable">
                        <thead>
                           <tr>
                              <th>Photo</th>
                              <th>Name</th>
                              <th>Instrument</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              if(!empty($members))
                                 foreach ($members as $key) {
                                    echo "<tr><td>"
                                    ?>
                                    <img style="width: 75px; height: 75px;" src="<?php echo base_url(); ?>content-uploaded/<?php echo $key->getPhoto(); ?>" alt="<?php echo $key->getPhoto(); ?>">
                                    <?php
                                    echo "</td>";
                                    echo "<td>{$key->getName()}</td>";
                                    echo "<td>{$key->getInstrument()}</td>";
                                    echo "<td><a href=\"".base_url('members/updateMember/'.$key->getIdMember())."\">Update</a></td></tr>";
                                 }
                              if(!empty($membersSignup))
                                 foreach ($membersSignup as $key) {
                                    echo "<tr><td>"
                                    ?>
                                    <img style="width: 75px; height: 75px;" src="<?php echo base_url(); ?>content-uploaded/<?php echo $key['photo']; ?>" alt="<?php echo $key['photo']; ?>">
                                    <?php
                                    echo "</td>";
                                    echo "<td>{$key['name']}</td>";
                                    echo "<td>{$key['instrument']}</td>";
                                    echo "<td><a href=\"".base_url('members/updateInstrument/'.$idBand.'/'.$key['idUser'])."\">Update</a></td></tr>";
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