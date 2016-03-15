<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>Administrators</title>

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
   <h1>Create Administrator</h1>

   <div id="body">
      <?php          
      echo form_open();

      $data = array(
      'name' => 'name',
      'type' => 'text',
      'style' => 'width: 210px;',
      'value' => $name
      );       
      echo '<div class="input-prepend" style="float: left; margin-right: 20px;"> <span class="add-on">Name</span>'.form_input($data);
      echo form_error('name', '<div class="error">', '</div>');
      echo '</div>';

      $data = array(
      'name' => 'email',
      'type' => 'text',
      'style' => 'width: 275px;',
      'value' => $email
      );       
      echo '<div class="input-prepend"> <span class="add-on">E-mail</span>'.form_input($data);
      echo form_error('email', '<div class="error">', '</div>');
      echo '</div><br>';

      $data = array(
      'name' => 'password',
      'type' => 'password'
      );       
      echo '<div class="input-prepend" style="float: left; margin-right: 20px;"> <span class="add-on">Senha</span>'.form_input($data);
      echo form_error('password', '<div class="error">', '</div>');
      echo '</div>';

      $options = array(
      'Overlord' => 'Overlord',
      'Master-Administrator' => 'Master-Administrator',
      'Administrator' => 'Administrator'
      );
      $js = 'id="permission" class="input"';
      echo '<div class="input-prepend"> <span class="add-on">Permissão</span>'.form_dropdown('permission', $options, $permission, $js);
      echo '</div><br>';

      $options = array(
      'Active' => 'Active',
      'Inactive' => 'Inactive'
      );
      $js = 'id="status" class="input"';
      echo '<div class="input-prepend"> <span class="add-on">Permissão</span>'.form_dropdown('status', $options, $status, $js);
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