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
                    <h1 class="page-header">Create Post</h1>
                </div>
                <!--End Page Header -->
            </div>
            
            <div class="row">

               <div class="col-lg-6">
                  <?php
                     echo form_open_multipart();

                     $data = array(
                     'name' => 'title',
                     'type' => 'text',
                     'placeholder' => 'Title *',
                     'class' => 'form-control',
                     'value' => $title
                     );       
                     echo '<div class="form-group">'.form_input($data);
                     echo form_error('title', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                     $data = array(
                     'name' => 'postName',
                     'type' => 'text',
                     'placeholder' => 'Slug (url) *',
                     'class' => 'form-control',
                     'value' => $postName
                     );       
                     echo '<div class="form-group">'.form_input($data);
                     echo form_error('postName', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                     $data = array(
                     'name' => 'date',
                     'type' => 'date',
                     'placeholder' => 'Publish Date *',
                     'class' => 'form-control',
                     'value' => $date
                     );       
                     echo '<div class="form-group">'.form_input($data);
                     echo form_error('date', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                     $options = array(
                        'Active' => 'Published',
                        'Inactive' => 'Not Published',
                     );
                     $js = 'id="status" class="form-control"';
                     echo '<div class="form-group">'.form_dropdown('status', $options, $status, $js);
                     echo form_error('status', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                     $data = array(
                     'name' => 'featuredImage',
                     'class' => 'form-control'
                     );       
                     echo '<div class="form-group">'.form_upload($data);
                     echo form_error('featuredImage', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                  ?>
                  <div class="col-lg-6">
                  <?php
                     $data = array(
                     'type' => 'submit',
                     'name' => 'submit',
                     'id' => 'submit',
                     'class' => 'btn btn-lg btn-success btn-block',
                     'value' => 'Create Post',
                     'onclick' => 'setTimeout(twoClicks, 1);'
                     );
                     echo form_input($data);

                  ?>
                  </div>

                  <div class="col-lg-6">
                     <a href="<?php echo base_url('posts/myPosts/'.$idBand);?>" class="btn btn-lg btn-danger btn-block">Cancel</a>
                  </div>
               
               </div>

               <div class="col-lg-6">
                  <?php

                     $data = array(
                     'name' => 'content',
                     'type' => 'text',
                     'placeholder' => 'Content *',
                     'class' => 'form-control',
                     'style' => 'resize: none; height: 230px;',
                     'value' => $content
                     );       
                     echo '<div class="form-group">'.form_textarea($data);
                     echo form_error('content', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                     form_close();
                  ?>
               </div>
            </div>

        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->
<?php
    $this->load->view('pages/footer');
?>