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
                    <h1 class="page-header">Update Tour</h1>
                </div>
                <!--End Page Header -->
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
                     'name' => 'description',
                     'type' => 'text',
                     'placeholder' => 'Description *',
                     'class' => 'form-control',
                     'value' => $description
                     );       
                     echo '<div class="form-group">'.form_input($data);
                     echo form_error('description', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                     $data = array(
                     'name' => 'beginDate',
                     'type' => 'date',
                     'placeholder' => 'Date *',
                     'class' => 'form-control',
                     'value' => $beginDate
                     );       
                     echo '<div class="form-group">'.form_input($data);
                     echo form_error('beginDate', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                     $data = array(
                     'name' => 'endDate',
                     'type' => 'date',
                     'placeholder' => 'Date *',
                     'class' => 'form-control',
                     'value' => $endDate
                     );       
                     echo '<div class="form-group">'.form_input($data);
                     echo form_error('endDate', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                  ?>
                  <div class="col-lg-6">
                  <?php
                     $data = array(
                     'type' => 'submit',
                     'name' => 'submit',
                     'id' => 'submit',
                     'class' => 'btn btn-lg btn-success btn-block',
                     'value' => 'Update Tour',
                     'onclick' => 'setTimeout(twoClicks, 1);'
                     );
                     echo form_input($data);

                  form_close();

                  ?>
                  </div>

                  <div class="col-lg-6">
                     <a href="<?php echo base_url('tours/myTours/'.$idBand);?>" class="btn btn-lg btn-danger btn-block">Cancel</a>
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