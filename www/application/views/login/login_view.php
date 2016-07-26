<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('pages/header');
?>

<body class="body-Login-back">

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
                <!--img src="assets/img/logo.png" alt=""/-->
                <img class="logo-ini" src="<?php echo base_url(); ?>assets/img/soundcheck.png" alt=""/>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                        <a class="sign-upClass btn btn-default btn-sm" href="<?php echo base_url('sign_up'); ?>">Sign Up</a>
                    </div>
                    <div class="panel-body">
                        <div role="form">
                            <?php          
                                echo form_open();

                                $data = array(
                                'name' => 'email',
                                'type' => 'email',
                                'class' => 'form-control',
                                'placeholder' => 'E-Mail'
                                );       
                                echo '<div class="form-group">'.form_input($data);
                                echo form_error('email', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                echo '</div>';

                                $data = array(
                                'name' => 'password',
                                'type' => 'password',
                                'class' => 'form-control',
                                'placeholder' => 'Password'
                                );       
                                echo '<div class="form-group">'.form_input($data);
                                echo form_error('email', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                echo '</div>';

                                $data = array(
                                'type' => 'submit',
                                'name' => 'submit',
                                'id' => 'submit',
                                'class' => 'btn btn-lg btn-success btn-block',
                                'value' => 'Login',
                                'onclick' => 'setTimeout(twoClicks, 1);'
                                );
                                echo form_input($data);

                                form_close();

                                if(isset($result) && $result == 'loginError') {  
                            ?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Your E-mail or Password is incorrect.
                                    </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    $this->load->view('pages/footer');
?>
