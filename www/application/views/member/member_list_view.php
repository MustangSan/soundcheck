<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>Members</title>

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

   table {
      /*border: 1px solid;*/
      color: black;
   }

   th {
      border-right: 1px solid;
      color: black;
      padding: 0px 10px;
   }

   td {
      text-align: center;
      padding: 5px 10px;
      border-right: 1px solid;
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
   <h1>Members</h1>

   <div id="body">
      <p><a href="<?php echo base_url('members/createMember/'.$idBand); ?>">Create Member</a></p>
      <p><a href="<?php echo base_url('members/insertMember/'.$idBand); ?>">Insert Member</a></p>
      <table>
         <tr>
            <th>Photo</th>
            <th>IdMember</th>
            <th>IdBand</th>
            <th>Name</th>
            <th>Instrument</th>
            <th></th>
         </tr>
            <?php 
            if(empty($members) && empty($membersSignup))
               echo "<tr><td colspan=11>No data found</td></tr>";
            else {
               if(!empty($members))
                  foreach ($members as $key) {
                     echo "<tr><td>{$key->getPhoto()}</td>";
                     echo "<td>{$key->getIdMember()}</td>";
                     echo "<td>{$key->getIdBand()}</td>";
                     echo "<td>{$key->getName()}</td>";
                     echo "<td>{$key->getInstrument()}</td>";
                     echo "<td><a href=\"".base_url('members/updateMember/'.$key->getIdMember())."\">Update</a></td></tr>";
                  }
               if(!empty($membersSignup))
                  foreach ($membersSignup as $key) {
                     echo "<tr><td>{$key['photo']}</td>";
                     echo "<td>{$key['idUser']}</td>";
                     echo "<td>{$idBand}</td>";
                     echo "<td>{$key['name']}</td>";
                     echo "<td>{$key['instrument']}</td>";
                     echo "<td><a href=\"".base_url('members/updateInstrument/'.$idBand.'/'.$key['idUser'])."\">Update</a></td></tr>";
                  }
            }
            ?>
      </table>
      <pre><code>
         <?php 
            //var_dump($members);
         ?>
      </code></pre>
   </div>

   <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>