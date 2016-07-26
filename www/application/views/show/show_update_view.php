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
                    <h1 class="page-header">Update Show</h1>
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
                     'name' => 'date',
                     'type' => 'date',
                     'placeholder' => 'Date *',
                     'class' => 'form-control',
                     'value' => $date
                     );       
                     echo '<div class="form-group">'.form_input($data);
                     echo form_error('date', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                     $data = array(
                     'name' => 'timetable',
                     'type' => 'text',
                     'placeholder' => 'Timetable *',
                     'class' => 'form-control',
                     'value' => $timetable
                     );       
                     echo '<div class="form-group">'.form_input($data);
                     echo form_error('timetable', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                     $data = array(
                     'name' => 'place',
                     'type' => 'text',
                     'placeholder' => 'Place *',
                     'class' => 'form-control',
                     'value' => $place
                     );       
                     echo '<div class="form-group">'.form_input($data);
                     echo form_error('place', '<div data-toggle="tooltip" class="fieldErrorLogin" title="', '" ><i class="fa fa-warning fa-fw" data-toggle="tooltip"></i></div>');
                     echo '</div>';

                  ?>
                  <div class="col-lg-6">
                  <?php
                     $data = array(
                     'type' => 'submit',
                     'name' => 'submit',
                     'id' => 'submit',
                     'class' => 'btn btn-lg btn-success btn-block',
                     'value' => 'Update Show',
                     'onclick' => 'setTimeout(twoClicks, 1);'
                     );
                     echo form_input($data);

                  form_close();

                  ?>
                  </div>

                  <div class="col-lg-6">
                     <?php 
                        if($this->uri->segment(1) == "shows") {
                     ?>
                           <a href="<?php echo base_url('shows/myShows/'.$idBand);?>" class="btn btn-lg btn-danger btn-block">Cancel</a>
                     <?php
                        }
                        else if($this->uri->segment(1) == "tours") 
                                 if(isset($idTour)) {
                     ?>
                           <a href="<?php echo base_url('tours/myTourShows/'.$idBand.'/'.$idTour);?>" class="btn btn-lg btn-danger btn-block">Cancel</a>
                     <?php 
                        } 
                     ?>
                  </div>
               </div>

               <div class="col-lg-6">
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
                           <label>Latitude: </label><input type="text" name="latitude" class="gllpLatitude form-control" value="<?php echo $latitude ?>" readonly="readonly" />
                        </div>
                        <div class="col-md-4">
                           <label>Longitude: </label><input type="text" name="longitude" class="gllpLongitude form-control" value="<?php echo $longitude ?>" readonly="readonly" />
                           <input type="hidden" class="gllpZoom" value="16"/>
                        </div>
                     </div>
                  </fieldset>
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