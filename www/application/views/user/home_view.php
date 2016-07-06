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
                                    <div class="lead">XX</div>
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
                                    <div class="lead">XX</div>
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
                                    <div class="lead">XX</div>
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
                                    <div class="lead">XX</div>
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
            </div>

        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->
<?php
    $this->load->view('pages/footer');
?>