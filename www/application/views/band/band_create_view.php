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
                    <h1 class="page-header">Create Band</h1>
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
                        'name' => 'about',
                        'type' => 'text',
                        'placeholder' => 'About *',
                        'class' => 'form-control',
                        'style' => 'resize: none; height: 83px;',
                        'value' => $about
                        );       
                        echo '<div class="form-group">'.form_textarea($data);
                        echo form_error('about', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
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

               <div class="col-lg-6">
                  <?php

                        $data = array(
                        'name' => 'photo',
                        'class' => 'form-control'
                        );       
                        echo '<div class="form-group">'.form_upload($data);
                        echo form_error('photo', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                        echo '</div>';

                        $data = array(
                        'name' => 'phone',
                        'type' => 'text',
                        'placeholder' => 'Phone *',
                        'class' => 'form-control',
                        'value' => $phone
                        );       
                        echo '<div class="form-group">'.form_input($data);
                        echo form_error('phone', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                        echo '</div>';

                        $data = array(
                        'name' => 'contactEmail',
                        'type' => 'email',
                        'placeholder' => 'Contact E-Mail *',
                        'class' => 'form-control',
                        'value' => $contactEmail
                        );       
                        echo '<div class="form-group">'.form_input($data);
                        echo form_error('contactEmail', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                        echo '</div>';

                  ?>

                  <label>Band Location:</label>
                  <fieldset class="gllpLatlonPicker">                  
                     <div class="form-group input-group">
                        <input type="text" class="form-control gllpSearchField">
                        <span class="input-group-btn">
                           <input type="button" class="btn btn-default gllpSearchButton" value="Pesquisar">
                        </span>
                     </div>
                     <div class="gllpMap">Google Maps</div>

                     <div class="row">
                        <div class="col-md-4">
                           <label>Latitude: </label><input type="text" name="latitude" class="gllpLatitude form-control" value="-15.7941454" readonly="readonly" />
                        </div>
                        <div class="col-md-4">
                           <label>Longitude: </label><input type="text" name="longitude" class="gllpLongitude form-control" value="-47.88254789999996" readonly="readonly" />
                           <input type="hidden" class="gllpZoom" value="5"/>
                        </div>
                     </div>
                  </fieldset>

               </div>
            </div>

            <div class="row">
               <div class="col-lg-6">
                  <?php

                        $data = array(
                        'type' => 'submit',
                        'name' => 'submit',
                        'id' => 'submit',
                        'class' => 'btn btn-lg btn-success btn-block',
                        'value' => 'Create Band',
                        'onclick' => 'setTimeout(twoClicks, 1);'
                        );
                        echo form_input($data);

                     form_close();
                  ?>
               </div>
               <div class="col-lg-6">
                  <a href="<?php echo base_url('bands/myBands');?>" class="btn btn-lg btn-danger btn-block">Cancel</a>
               </div>
            </div>

        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

   <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC6HIt-7BKNGCCQVBE09zZPZzLiujz5Klc&sensor=false&libraries=places"></script>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/map/jquery-gmaps-latlon-picker.css"/>
   <script src="<?php echo base_url(); ?>assets/map/jquery-gmaps-latlon-picker.js"></script>
   <script type="text/javascript">
      function stopRKey(evt) { 
         var evt = (evt) ? evt : ((event) ? event : null); 
         var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
         if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
      }
      document.onkeypress = stopRKey;

      $(function() {
         var autocomplete = new google.maps.places.Autocomplete((document.getElementsByClassName('gllpSearchField')[0]), {types: ['geocode']});
      });
   </script>

<?php
    $this->load->view('pages/footer');
?>