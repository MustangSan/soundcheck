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
                    <h1 class="page-header">Update Member</h1>
                </div>
                <!--End Page Header -->
            </div>
            
            <div class="row">

               <div class="col-lg-6">
                  <?php          
                     echo form_open_multipart();

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
                     'name' => 'instrument',
                     'type' => 'text',
                     'placeholder' => 'Instrument *',
                     'class' => 'form-control',
                     'value' => $instrument
                     );       
                     echo '<div class="form-group">'.form_input($data);
                     echo form_error('instrument', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                     $data = array(
                     'name' => 'photo',
                     'class' => 'form-control'
                     );       
                     echo '<div class="form-group">'.form_upload($data);
                     echo form_error('photo', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                  ?>
                  <div class="col-lg-6">
                  <?php
                     $data = array(
                     'type' => 'submit',
                     'name' => 'submit',
                     'id' => 'submit',
                     'class' => 'btn btn-lg btn-success btn-block',
                     'value' => 'Update Member',
                     'onclick' => 'setTimeout(twoClicks, 1);'
                     );
                     echo form_input($data);

                  form_close();

                  ?>
                  </div>

                  <div class="col-lg-6">
                     <a href="<?php echo base_url('members/bandMembers/'.$idBand);?>" class="btn btn-lg btn-danger btn-block">Cancel</a>
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