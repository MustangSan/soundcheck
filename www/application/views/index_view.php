<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('pages/header');
?>

<body class="body-Login-back">

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
                <img class="logo-ini" src="<?php echo base_url(); ?>assets/img/soundcheck.png" alt=""/>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">    
                    <div class="panel-heading">
                        <h3 class="text-center panel-title">Welcome to Soundcheck</h3>
                    </div>              
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <a class="btn btn-primary btn-lg btn-block" href="<?php echo base_url('login'); ?>">Sign in</a>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-primary btn-lg btn-block" href="<?php echo base_url('sign_up'); ?>">Sign up</a>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <!-- Page Header -->
                                <div class="col-md-12">
                                    <a class="btn btn-success btn-lg btn-block" href="<?php echo base_url('mapa.html'); ?>">Mapa</a>
                                </div>
                                <!--End Page Header -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    $this->load->view('pages/footer');
?>
