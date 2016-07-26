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
               <h1 class="page-header">Welcome to Soundcheck!</h1>
            </div>
            <!--End Page Header -->
         </div>
         
         <!--
         <div class="row">
            <div class="col-lg-4">
               <div class="panel panel-primary">
                  <div class="panel-heading">
                     Search for:
                  </div>
                  <div class="panel-body">
                     <p>
                        <a href="<?php echo base_url('bands'); ?>" class="btn btn-primary">Bands</a>
                        <a href="<?php echo base_url('studios'); ?>" class="btn btn-primary">Studios</a>
                        <a href="<?php echo base_url('venues'); ?>" class="btn btn-primary">Venues</a>
                        <a href="<?php echo base_url('gigs'); ?>" class="btn btn-primary">Gigs</a>
                     </p>
                  </div>
               </div>
            </div>
         </div>

         -->

         <div class="row">
         
         <!-- Color Painel -->
            <div class="col-lg-3 col-md-6">
               <div class="panel panel-primary no-boder">
                  <div class="panel-body green">
                     <div class="row">
                        <div class="col-xs-3">
                           <i class="fa fa-music fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                           <div class="lead">03</div>
                           <div>Bandas</div>
                        </div>
                     </div>
                  </div>
                  
                  <a href="<?php echo base_url('bands/myBands'); ?>">
                     <div class="panel-footer">
                        <span class="pull-left">Ver detalhes</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                     </div>
                  </a>
               </div>
            </div>
            <!-- End Color Painel -->


            <!-- Color Painel -->
            <div class="col-lg-3 col-md-6">
               <div class="panel panel-primary no-boder">
                  <div class="panel-body green">
                     <div class="row">
                        <div class="col-xs-3">
                           <i class="fa fa-music fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                           <div class="lead">01</div>
                           <div>Studios</div>
                        </div>
                     </div>
                  </div>
                  
                  <a href="<?php echo base_url('bands/myBands'); ?>">
                     <div class="panel-footer">
                        <span class="pull-left">Ver detalhes</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                     </div>
                  </a>
               </div>
            </div>
            <!-- End Color Painel -->


            <!-- Color Painel -->
            <div class="col-lg-3 col-md-6">
               <div class="panel panel-primary no-boder">
                  <div class="panel-body green">
                     <div class="row">
                        <div class="col-xs-3">
                           <i class="fa fa-music fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                           <div class="lead">02</div>
                           <div>Venues</div>
                        </div>
                     </div>
                  </div>
                  
                  <a href="<?php echo base_url('bands/myBands'); ?>">
                     <div class="panel-footer">
                        <span class="pull-left">Ver detalhes</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                     </div>
                  </a>
               </div>
            </div>
            <!-- End Color Painel -->


            <!-- Color Painel -->
            <div class="col-lg-3 col-md-6">
               <div class="panel panel-primary no-boder">
                  <div class="panel-body green">
                     <div class="row">
                        <div class="col-xs-3">
                           <i class="fa fa-music fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                           <div class="lead">00</div>
                           <div>Gigs</div>
                        </div>
                     </div>
                  </div>
                  
                  <a href="<?php echo base_url('bands/myBands'); ?>">
                     <div class="panel-footer">
                        <span class="pull-left">Ver detalhes</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                     </div>
                  </a>
               </div>
            </div>
            <!-- End Color Painel -->
         </div>

         <div class="row">
            <div class="col-lg-12">
               <!--Timeline -->
               <div class="panel panel-primary">
                  <div class="panel-heading">
                     <i class="fa fa-clock-o fa-fw"></i>Timeline
                  </div>

                  <div class="panel-body">
                     <ul class="timeline">
                        <li>
                           <div class="timeline-badge">
                              <i class="fa fa-check"></i>
                           </div>
                           <div class="timeline-panel">
                              <div class="timeline-heading">
                                 <h4 class="timeline-title">Timeline Event</h4>
                                 <p>
                                    <small class="text-muted"><i class="fa fa-time"></i>11 hours ago via Twitter</small>
                                 </p>
                              </div>
                              <div class="timeline-body">
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                              </div>
                           </div>
                        </li>
                        <li class="timeline-inverted">
                           <div class="timeline-badge warning">
                              <i class="fa fa-credit-card"></i>
                           </div>
                           <div class="timeline-panel">
                              <div class="timeline-heading">
                                 <h4 class="timeline-title">Timeline Event</h4>
                              </div>
                              <div class="timeline-body">
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                              </div>
                           </div>
                        </li>
                        <li>
                           <div class="timeline-badge danger">
                              <i class="fa fa-credit-card"></i>
                           </div>
                           <div class="timeline-panel">
                              <div class="timeline-heading">
                                 <h4 class="timeline-title">Timeline Event</h4>
                              </div>
                              <div class="timeline-body">
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                              </div>
                           </div>
                        </li>
                        <li class="timeline-inverted">
                           <div class="timeline-panel">
                              <div class="timeline-heading">
                                 <h4 class="timeline-title">Timeline Event</h4>
                              </div>
                              <div class="timeline-body">
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                              </div>
                           </div>
                        </li>
                        <li>
                           <div class="timeline-badge info">
                              <i class="fa fa-save"></i>
                           </div>
                           <div class="timeline-panel">
                              <div class="timeline-heading">
                                 <h4 class="timeline-title">Timeline Event</h4>
                              </div>
                              <div class="timeline-body">
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                                 <hr>
                                 <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                       <i class="fa fa-cog"></i>
                                       <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                       <li><a href="#">Action</a>
                                       </li>
                                       <li><a href="#">Another action</a>
                                       </li>
                                       <li><a href="#">Something else here</a>
                                       </li>
                                       <li class="divider"></li>
                                       <li><a href="#">Separated link</a>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </li>
                        <li>
                           <div class="timeline-panel">
                              <div class="timeline-heading">
                                 <h4 class="timeline-title">Timeline Event</h4>
                              </div>
                              <div class="timeline-body">
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                              </div>
                           </div>
                        </li>
                        <li class="timeline-inverted">
                           <div class="timeline-badge success">
                              <i class="fa fa-thumbs-up"></i>
                           </div>
                           <div class="timeline-panel">
                              <div class="timeline-heading">
                                 <h4 class="timeline-title">Timeline Event</h4>
                              </div>
                              <div class="timeline-body">
                                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel justo eu mi scelerisque vulputate. Aliquam in metus eu lectus aliquet egestas.</p>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </div>

               </div>
               <!--End Timeline -->
            </div>
         </div>

      </div>
      <!-- end page-wrapper -->

   </div>
   <!-- end wrapper -->
<?php
   $this->load->view('pages/footer');
?>