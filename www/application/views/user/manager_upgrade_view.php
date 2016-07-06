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
               <?php  
        
                  echo form_open();

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
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->
<?php
    $this->load->view('pages/footer');
?>