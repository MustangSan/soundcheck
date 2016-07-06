<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('pages/header');
?>

<body class="body-Login-back">

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
                <!--img src="assets/img/logo.png" alt=""/-->
                <h1>Soundcheck</h1>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">    
                    <div class="panel-heading">
                        <h3 class="panel-title">Welcome to Soundcheck</h3>
                    </div>              
                    <div class="panel-body">
                        <div class="row">
                            <!-- Page Header -->
                            <div class="col-lg-12">
                                <center><p><a class="btn btn-primary btn-lg" href="<?php echo base_url('login'); ?>">Sign in</a>
                                <a class="btn btn-primary btn-lg" href="<?php echo base_url('sign_up'); ?>">Sign up</a></p></center>
                            </div>
                            <!--End Page Header -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    $this->load->view('pages/footer');
?>
