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
                        <a class="sign-upClass btn btn-default btn-sm" href="<?php echo base_url('login'); ?>">Sign in</a>
                    </div>
                    <div class="panel-body">
                        <div role="form">
                            <?php          
                                echo form_open();

                                $data = array(
                                'name' => 'name',
                                'type' => 'text',
                                'class' => 'form-control',
                                'placeholder' => 'Name',
                                'value' => $name
                                );       
                                echo '<div class="form-group">'.form_input($data);
                                echo form_error('name', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                echo '</div>';

                                $data = array(
                                'name' => 'email',
                                'type' => 'email',
                                'class' => 'form-control',
                                'placeholder' => 'E-Mail',
                                'value' => $email
                                );       
                                echo '<div class="form-group">'.form_input($data);
                                echo form_error('email', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                echo '</div>';

                                $options = array(
                                NULL => 'Select an Account Type',
                                'Fa' => 'Fa',
                                'Musician' => 'Musician',
                                'Manager' => 'Manager'
                                );
                                $js = 'id="accountType" class="form-control"';
                                echo '<div class="form-group">'.form_dropdown('accountType', $options, $accountType, $js);
                                echo form_error('accountType', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                echo '</div>';

                                $data = array(
                                'type' => 'submit',
                                'name' => 'submit',
                                'id' => 'submit',
                                'class' => 'btn btn-lg btn-success btn-block',
                                'value' => 'Sing Up',
                                'onclick' => 'setTimeout(twoClicks, 1);'
                                );
                                echo form_input($data);

                                form_close();
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