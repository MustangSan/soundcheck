<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>Users</title>

   <style type="text/css">

   ::selection { background-color: #E13300; color: white; }
   ::-moz-selection { background-color: #E13300; color: white; }

   body {
      background-color: #fff;
      margin: 40px;
      font: 13px/20px normal Helvetica, Arial, sans-serif;
      color: #4F5155;
   }

   a {
      color: #003399;
      background-color: transparent;
      font-weight: normal;
   }

   h1 {
      color: #444;
      background-color: transparent;
      border-bottom: 1px solid #D0D0D0;
      font-size: 19px;
      font-weight: normal;
      margin: 0 0 14px 0;
      padding: 14px 15px 10px 15px;
   }

   code {
      font-family: Consolas, Monaco, Courier New, Courier, monospace;
      font-size: 12px;
      background-color: #f9f9f9;
      border: 1px solid #D0D0D0;
      color: #002166;
      display: block;
      margin: 14px 0 14px 0;
      padding: 12px 10px 12px 10px;
   }

   #body {
      margin: 0 15px 0 15px;
   }

   p.footer {
      text-align: right;
      font-size: 11px;
      border-top: 1px solid #D0D0D0;
      line-height: 32px;
      padding: 0 10px 0 10px;
      margin: 20px 0 0 0;
   }

   #container {
      margin: 10px;
      border: 1px solid #D0D0D0;
      box-shadow: 0 0 8px #D0D0D0;
   }
   </style>
</head>
<body>

<div id="container">
   <h1>Create Fa</h1>

   <div id="body">
      <?php          
      echo form_open();

      $data = array(
      'name' => 'email',
      'type' => 'text',
      'style' => 'width: 210px;',
      'value' => $email
      );       
      echo '<div class="input-prepend" > <span class="add-on">email</span>'.form_input($data);
      echo form_error('email', '<div class="error">', '</div>');
      echo '</div><br>';

      $data = array(
      'name' => 'password',
      'type' => 'password',
      'style' => 'width: 210px;',
      'value' => $password
      );       
      echo '<div class="input-prepend" > <span class="add-on">password</span>'.form_input($data);
      echo form_error('password', '<div class="error">', '</div>');
      echo '</div><br>';

      $data = array(
      'name' => 'name',
      'type' => 'text',
      'style' => 'width: 210px;',
      'value' => $name
      );       
      echo '<div class="input-prepend" > <span class="add-on">name</span>'.form_input($data);
      echo form_error('name', '<div class="error">', '</div>');
      echo '</div><br>';

      $data = array(
      'name' => 'photo',
      'type' => 'text',
      'style' => 'width: 210px;',
      'value' => $photo
      );       
      echo '<div class="input-prepend" > <span class="add-on">photo</span>'.form_input($data);
      echo form_error('photo', '<div class="error">', '</div>');
      echo '</div><br>';

      $data = array(
      'name' => 'country',
      'type' => 'text',
      'style' => 'width: 210px;',
      'value' => $country
      );       
      echo '<div class="input-prepend" > <span class="add-on">Country</span>'.form_input($data);
      echo form_error('country', '<div class="error">', '</div>');
      echo '</div><br>';

      $data = array(
      'name' => 'estate',
      'type' => 'text',
      'style' => 'width: 210px;',
      'value' => $estate
      );       
      echo '<div class="input-prepend" > <span class="add-on">Estate</span>'.form_input($data);
      echo form_error('estate', '<div class="error">', '</div>');
      echo '</div><br>';

      $data = array(
      'name' => 'city',
      'type' => 'text',
      'style' => 'width: 210px;',
      'value' => $city
      );       
      echo '<div class="input-prepend" > <span class="add-on">City</span>'.form_input($data);
      echo form_error('city', '<div class="error">', '</div>');
      echo '</div><br>';

      $data = array(
      'name' => 'zipcode',
      'type' => 'text',
      'style' => 'width: 210px;',
      'value' => $zipcode
      );       
      echo '<div class="input-prepend" > <span class="add-on">zipcode</span>'.form_input($data);
      echo form_error('zipcode', '<div class="error">', '</div>');
      echo '</div><br>';

      $data = array(
      'name' => 'registeredDate',
      'type' => 'text',
      'style' => 'width: 210px;',
      'value' => $registeredDate
      );       
      echo '<div class="input-prepend" > <span class="add-on">registeredDate</span>'.form_input($data);
      echo form_error('registeredDate', '<div class="error">', '</div>');
      echo '</div><br>';

      $data = array(
      'name' => 'status',
      'type' => 'text',
      'style' => 'width: 210px;',
      'value' => $status
      );       
      echo '<div class="input-prepend" > <span class="add-on">status</span>'.form_input($data);
      echo form_error('status', '<div class="error">', '</div>');
      echo '</div><br>';

      $data = array(
      'type' => 'submit',
      'name' => 'submit',
      'id' => 'submit',
      'class' => 'btn btn-info',
      'value' => 'Concluir',
      'onclick' => 'setTimeout(twoClicks, 1);'
      );
      echo form_input($data);

      form_close();

      ?>
   </div>

   <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>