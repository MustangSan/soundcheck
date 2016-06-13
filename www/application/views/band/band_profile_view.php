<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>Band</title>

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
   <h1>Band</h1>

   <div id="body">
      <?php 
      if(!empty($band)) {
      ?>
         <p><a href="<?php echo base_url('bands/followBand/'.$band->getIdBand()); ?>">Follow Me</a></p>
         <table>
            <tr>
               <th>Photo</th>
               <th>IdBand</th>
               <th>Name</th>
               <th>About</th>
               <th>Website</th>
               <th>Facebook</th>
               <th>Twitter</th>
               <th>Youtube</th>
               <th>Myspace</th>
               <th>Country</th>
               <th>Estate</th>
               <th>City</th>
               <th>Phone</th>
               <th>Email</th>
            </tr>
            <?php 
                  echo "<tr><td>{$band->getPhoto()}</td>";
                  echo "<td>{$band->getIdBand()}</td>";
                  echo "<td>{$band->getName()}</td>";
                  echo "<td>{$band->getAbout()}</td>";
                  echo "<td>{$band->getWebsite()}</td>";
                  echo "<td>{$band->getFacebook()}</td>";
                  echo "<td>{$band->getTwitter()}</td>";
                  echo "<td>{$band->getYoutube()}</td>";
                  echo "<td>{$band->getMyspace()}</td>";
                  echo "<td>{$band->getCountry()}</td>";
                  echo "<td>{$band->getEstate()}</td>";
                  echo "<td>{$band->getCity()}</td>";
                  echo "<td>{$band->getPhone()}</td>";
                  echo "<td>{$band->getContactEmail()}</td>";
               }
               else
                  echo "<p>No data found</p>"
            ?>
      </table>

      <p><a href="<?php echo base_url('bands/albuns/'.$band->getIdBand()); ?>">Albuns</a></p>
      <p><a href="<?php echo base_url('bands/shows/'.$band->getIdBand()); ?>">Shows</a></p>
      <p><a href="<?php echo base_url('bands/tours/'.$band->getIdBand()); ?>">Tours</a></p>
      <p><a href="<?php echo base_url('bands/members/'.$band->getIdBand()); ?>">Members</a></p>
      <p><a href="<?php echo base_url('bands/blog/'.$band->getIdBand()); ?>">Blog</a>

      <pre><code>
         <?php 
            //var_dump($bands);
         ?>
      </code></pre>
   </div>

   <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>