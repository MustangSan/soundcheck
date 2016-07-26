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
                    <h1 class="page-header">Create Album</h1>
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
                     'name' => 'coverArt',
                     'class' => 'form-control'
                     );       
                     echo '<div class="form-group">'.form_upload($data);
                     echo form_error('coverArt', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                     $data = array(
                     'name' => 'genre',
                     'type' => 'text',
                     'placeholder' => 'Genre *',
                     'class' => 'form-control',
                     'value' => $genre
                     );       
                     echo '<div class="form-group">'.form_input($data);
                     echo form_error('genre', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                     $data = array(
                     'name' => 'releaseDate',
                     'type' => 'text',
                     'placeholder' => 'Release Date *',
                     'class' => 'form-control',
                     'value' => $releaseDate
                     );       
                     echo '<div class="form-group">'.form_input($data);
                     echo form_error('releaseDate', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                     $data = array(
                     'name' => 'label',
                     'type' => 'text',
                     'placeholder' => 'Label *',
                     'class' => 'form-control',
                     'value' => $label
                     );       
                     echo '<div class="form-group">'.form_input($data);
                     echo form_error('label', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                     $data = array(
                     'name' => 'copyrightDate',
                     'type' => 'text',
                     'placeholder' => 'Copyright *',
                     'class' => 'form-control',
                     'value' => $copyrightDate
                     );       
                     echo '<div class="form-group">'.form_input($data);
                     echo form_error('copyrightDate', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                     $data = array(
                     'name' => 'sellerLink',
                     'type' => 'text',
                     'placeholder' => 'Seller Link',
                     'class' => 'form-control',
                     'value' => $sellerLink
                     );       
                     echo '<div class="form-group">'.form_input($data);
                     echo form_error('sellerLink', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                     $data = array(
                     'name' => 'listeningLink',
                     'type' => 'text',
                     'placeholder' => 'Listening Link',
                     'class' => 'form-control',
                     'value' => $listeningLink
                     );       
                     echo '<div class="form-group">'.form_input($data);
                     echo form_error('listeningLink', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                  ?>
                  <div class="col-lg-6">
                  <?php
                     $data = array(
                     'type' => 'submit',
                     'name' => 'submit',
                     'id' => 'submit',
                     'class' => 'btn btn-lg btn-success btn-block',
                     'value' => 'Create Album',
                     'onclick' => 'setTimeout(twoClicks, 1);'
                     );
                     echo form_input($data);

                  form_close();

                  ?>
                  </div>

                  <div class="col-lg-6">
                     <a href="<?php echo base_url('albuns/myAlbuns/'.$idBand);?>" class="btn btn-lg btn-danger btn-block">Cancel</a>
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