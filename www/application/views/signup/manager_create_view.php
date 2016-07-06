<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('pages/header');
?>

<body class="body-Login-back">

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin-10 ">
                <!--img src="assets/img/logo.png" alt=""/-->
                <h1>Soundcheck</h1>
            </div>
            <div class="col-md-12">
                <div class="singup-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign Up</h3>
                    </div>
                    <div class="panel-body">
                        <div role="form">
                        <div class="form-group">
                            <p class="form-control-static">* Required Fields</p>
                        </div>
                            <div class="row">
                                <div class="col-lg-6">
                                <?php
                                    echo form_open();

                                    $data = array(
                                    'name' => 'name',
                                    'type' => 'text',
                                    'placeholder' => 'Name *',
                                    'class' => 'form-control',
                                    'value' => $name
                                    );       
                                    echo '<div class="form-group">'.form_input($data);
                                    echo form_error('name', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                    echo '</div>';

                                    $data = array(
                                    'name' => 'email',
                                    'type' => 'email',
                                    'placeholder' => 'E-Mail *',
                                    'class' => 'form-control',
                                    'value' => $email
                                    );       
                                    echo '<div class="form-group">'.form_input($data);
                                    echo form_error('email', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                    echo '</div>';

                                    $data = array(
                                    'name' => 'password',
                                    'type' => 'password',
                                    'placeholder' => 'Password *',
                                    'class' => 'form-control'
                                    );       
                                    echo '<div class="form-group">'.form_input($data);
                                    echo form_error('password', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                    echo '</div>';

                                    $data = array(
                                    'name' => 'photo',
                                    'class' => 'form-control'
                                    );       
                                    echo '<div class="form-group">'.form_upload($data);
                                    echo form_error('photo', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                    echo '</div>';

                                    $data = array(
                                    'name' => 'country',
                                    'type' => 'text',
                                    'placeholder' => 'Country *',
                                    'class' => 'form-control',
                                    'value' => $country
                                    );       
                                    echo '<div class="form-group">'.form_input($data);
                                    echo form_error('country', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                    echo '</div>';

                                    $data = array(
                                    'name' => 'estate',
                                    'type' => 'text',
                                    'placeholder' => 'Estate *',
                                    'class' => 'form-control',
                                    'value' => $estate
                                    );       
                                    echo '<div class="form-group">'.form_input($data);
                                    echo form_error('estate', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                    echo '</div>';

                                    $data = array(
                                    'name' => 'city',
                                    'type' => 'text',
                                    'placeholder' => 'City *',
                                    'class' => 'form-control',
                                    'value' => $city
                                    );       
                                    echo '<div class="form-group">'.form_input($data);
                                    echo form_error('city', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                    echo '</div>';

                                    $data = array(
                                    'name' => 'zipcode',
                                    'type' => 'text',
                                    'placeholder' => 'Zipcode *',
                                    'class' => 'form-control',
                                    'value' => $zipcode
                                    );       
                                    echo '<div class="form-group">'.form_input($data);
                                    echo form_error('zipcode', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                    echo '</div>';

                                    $data = array(
                                    'name' => 'registeredDate',
                                    'type' => 'text',
                                    'placeholder' => 'Registered Date *',
                                    'class' => 'form-control',
                                    'value' => $registeredDate
                                    );       
                                    echo '<div class="form-group">'.form_input($data);
                                    echo form_error('registeredDate', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                    echo '</div>';
                                ?>
                                
                                </div>
                                <div class="col-lg-6">
                                <?php
                                    
                                    $data = array(
                                    'name' => 'description',
                                    'type' => 'text',
                                    'placeholder' => 'Description *',
                                    'class' => 'form-control',
                                    'style' => 'resize: none; height: 83px;',
                                    'value' => $description
                                    );       
                                    echo '<div class="form-group">'.form_textarea($data);
                                    echo form_error('description', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                    echo '</div>';

                                    $data = array(
                                    'name' => 'agencyName',
                                    'type' => 'text',
                                    'placeholder' => 'Agency Name',
                                    'class' => 'form-control',
                                    'value' => $agencyName
                                    );       
                                    echo '<div class="form-group">'.form_input($data);
                                    echo form_error('agencyName', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                    echo '</div>';

                                    $data = array(
                                    'name' => 'contactEmail',
                                    'type' => 'text',
                                    'placeholder' => 'Contact E-Mail *',
                                    'class' => 'form-control',
                                    'value' => $contactEmail
                                    );       
                                    echo '<div class="form-group">'.form_input($data);
                                    echo form_error('contactEmail', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                    echo '</div>';

                                    $data = array(
                                    'name' => 'phone',
                                    'type' => 'text',
                                    'placeholder' => 'Telephone',
                                    'class' => 'form-control',
                                    'value' => $phone
                                    );       
                                    echo '<div class="form-group">'.form_input($data);
                                    echo form_error('phone', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                    echo '</div>';

                                    $data = array(
                                    'name' => 'website',
                                    'type' => 'text',
                                    'placeholder' => 'Website',
                                    'class' => 'form-control',
                                    'value' => $website
                                    );       
                                    echo '<div class="form-group">'.form_input($data);
                                    echo form_error('website', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                    echo '</div>';

                                    $data = array(
                                    'name' => 'facebook',
                                    'type' => 'text',
                                    'placeholder' => 'Facebook',
                                    'class' => 'form-control',
                                    'value' => $facebook
                                    );       
                                    echo '<div class="form-group">'.form_input($data);
                                    echo form_error('facebook', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                    echo '</div>';

                                    $data = array(
                                    'name' => 'twitter',
                                    'type' => 'text',
                                    'placeholder' => 'Twitter',
                                    'class' => 'form-control',
                                    'value' => $twitter
                                    );       
                                    echo '<div class="form-group">'.form_input($data);
                                    echo form_error('twitter', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                    echo '</div>';

                                    $data = array(
                                    'name' => 'youtube',
                                    'type' => 'text',
                                    'placeholder' => 'Youtube',
                                    'class' => 'form-control',
                                    'value' => $youtube
                                    );       
                                    echo '<div class="form-group">'.form_input($data);
                                    echo form_error('youtube', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                    echo '</div>';

                                    $data = array(
                                    'name' => 'myspace',
                                    'type' => 'text',
                                    'placeholder' => 'Myspace',
                                    'class' => 'form-control',
                                    'value' => $myspace
                                    );       
                                    echo '<div class="form-group">'.form_input($data);
                                    echo form_error('myspace', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                                    echo '</div>';

                                ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3">
                                <?php

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
                                <div class="col-lg-3">
                                    <a href="<?php echo base_url(); ?>sign_up" class="btn btn-lg btn-default btn-block">Cancel</a>
                                </div>
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