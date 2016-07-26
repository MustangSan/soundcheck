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

         <?php 
            if(!empty($band)) {
         ?>

         <div class="row">
               <!-- Page Header -->
               <div class="col-lg-12">
                  <h1 class="page-header"><?php echo $band->getName()?></h1>
                  
               </div>
               <!--End Page Header -->
         </div>

         <div class="row">
            <div class="panel panel-default">
               <div class="panel-heading">
                  Profile
                  <a class="create-btn btn btn-success btn-sm" style="float: right;" href="<?php echo base_url('bands/updateBand/'.$band->getIdBand()); ?>">
                     <i class="fa fa-music fa-fw"></i> Update Profile
                  </a>
               </div>
               <div class="panel-body">
                  <div class="row">
                     <div class="col-md-3">
                        <img class="profile-photo" src="<?php echo base_url(); ?>content-uploaded/<?php echo $band->getPhoto(); ?>" alt="<?php echo $band->getPhoto(); ?>">

                        <div class="text-center">
                           <a target="_blank" href="<?php echo $band->getFacebook();?>" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
                           <a target="_blank" href="<?php echo $band->getTwitter();?>" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
                           <a target="_blank" href="<?php echo $band->getMyspace();?>" class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
                           <a target="_blank" href="<?php echo $band->getYoutube();?>" class="btn btn-social-icon btn-pinterest"><i class="fa fa-youtube"></i></a>
                        </div>

                        <p><?php echo $band->getWebsite(); ?></p>

                     </div>

                     <div class="col-md-4">

                        <h3 style="margin-top: 0px" class="page-header">About: </h3>
                        <p><?php echo $band->getAbout(); ?></p>

                     </div>

                     <div class="col-md-4">
                        <h3 style="margin-top: 0px" class="page-header">Contacts: </h3>
                        <?php 
                           echo "<p>Country: {$band->getCountry()}</p>";
                           echo "<p>Estate: {$band->getEstate()}</p>";
                           echo "<p>City: {$band->getCity()}</p>";
                           echo "<p>Phone: {$band->getPhone()}</p>";
                           echo "<p>E-Mail: {$band->getContactEmail()}</p>";
                        ?>
                     </div>
                     
                  </div>

                  <div style="margin-top: 15px;" class="row">

                     <!-- Color Painel -->
                     <div class="col-lg-2 col-md-4">
                        <div class="panel panel-primary no-boder">
                           <div class="panel-body green">
                              <div class="row">
                                 <div class="col-xs-3">
                                    <i class="fa fa-music fa-4x"></i>
                                 </div>
                                 <div class="col-xs-9 text-right">
                                    <div class="lead"><?php echo $countMembers; ?></div>
                                    <div>Members</div>
                                 </div>
                              </div>
                           </div>
                           
                           <a href="<?php echo base_url('members/bandMembers/'.$band->getIdBand()); ?>">
                              <div class="panel-footer">
                                 <span class="pull-left">More Details</span>
                                 <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                 <div class="clearfix"></div>
                              </div>
                           </a>
                        </div>
                     </div>
                     <!-- End Color Painel -->
                     
                     <!-- Color Painel -->
                     <div class="col-lg-2 col-md-4">
                        <div class="panel panel-primary no-boder">
                           <div class="panel-body green">
                              <div class="row">
                                 <div class="col-xs-3">
                                    <i class="fa fa-music fa-4x"></i>
                                 </div>
                                 <div class="col-xs-9 text-right">
                                    <div class="lead"><?php echo $countAlbuns; ?></div>
                                    <div>Albuns</div>
                                 </div>
                              </div>
                           </div>
                           
                           <a href="<?php echo base_url('albuns/myAlbuns/'.$band->getIdBand()); ?>">
                              <div class="panel-footer">
                                 <span class="pull-left">More Details</span>
                                 <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                 <div class="clearfix"></div>
                              </div>
                           </a>
                        </div>
                     </div>
                     <!-- End Color Painel -->

                     <!-- Color Painel -->
                     <div class="col-lg-2 col-md-4">
                        <div class="panel panel-primary no-boder">
                           <div class="panel-body green">
                              <div class="row">
                                 <div class="col-xs-3">
                                    <i class="fa fa-music fa-4x"></i>
                                 </div>
                                 <div class="col-xs-9 text-right">
                                    <div class="lead"><?php echo $countShows; ?></div>
                                    <div>Shows</div>
                                 </div>
                              </div>
                           </div>
                           
                           <a href="<?php echo base_url('shows/myShows/'.$band->getIdBand()); ?>">
                              <div class="panel-footer">
                                 <span class="pull-left">More Details</span>
                                 <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                 <div class="clearfix"></div>
                              </div>
                           </a>
                        </div>
                     </div>
                     <!-- End Color Painel -->

                     <!-- Color Painel -->
                     <div class="col-lg-2 col-md-4">
                        <div class="panel panel-primary no-boder">
                           <div class="panel-body green">
                              <div class="row">
                                 <div class="col-xs-3">
                                    <i class="fa fa-music fa-4x"></i>
                                 </div>
                                 <div class="col-xs-9 text-right">
                                    <div class="lead"><?php echo $countTours; ?></div>
                                    <div>Tours</div>
                                 </div>
                              </div>
                           </div>
                           
                           <a href="<?php echo base_url('tours/myTours/'.$band->getIdBand()); ?>">
                              <div class="panel-footer">
                                 <span class="pull-left">More Details</span>
                                 <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                 <div class="clearfix"></div>
                              </div>
                           </a>
                        </div>
                     </div>
                     <!-- End Color Painel -->

                     <!-- Color Painel -->
                     <div class="col-lg-2 col-md-4">
                        <div class="panel panel-primary no-boder">
                           <div class="panel-body green">
                              <div class="row">
                                 <div class="col-xs-3">
                                    <i class="fa fa-music fa-4x"></i>
                                 </div>
                                 <div class="col-xs-9 text-right">
                                    <div class="lead"><?php echo $countPosts; ?></div>
                                    <div>Posts</div>
                                 </div>
                              </div>
                           </div>
                           
                           <a href="<?php echo base_url('posts/myPosts/'.$band->getIdBand()); ?>">
                              <div class="panel-footer">
                                 <span class="pull-left">More Details</span>
                                 <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                 <div class="clearfix"></div>
                              </div>
                           </a>
                        </div>
                     </div>
                     <!-- End Color Painel -->

                  </div>

                  <?php 
                     }
                     else {
                  ?>
                     <div class="row">
                        <div class="col-md-8">
                           <div class="text-center">
                              <h2>No band has been found</h2>
                           </div>
                        </div>
                     </div>
                  <?php
                     }
                  ?>
               </div>

            </div>

         </div>
      
      </div>
      <!-- end page-wrapper -->

   </div>
   <!-- end wrapper -->
<?php
   $this->load->view('pages/footer');
?>