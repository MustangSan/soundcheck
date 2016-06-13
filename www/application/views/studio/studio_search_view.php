<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>Studios</title>

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
      padding: 10px 25px;
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
   <h1>Studios</h1>

   <div id="body">
      <table>
         <tr>
            <th>Name</th>
            <th>About</th>
            <th>Website</th>
            <th>Facebook</th>
            <th>Twitter</th>
            <th>Youtube</th>
            <th>Country</th>
            <th>Estate</th>
            <th>City</th>
            <th>District</th>
            <th>Street</th>
            <th>Number</th>
            <th>Complement</th>
            <th>Zipcode</th>
            <th>Phone</th>
            <th>Phone Auxiliar</th>
            <th>Contact Email</th>
         </tr>
            <?php 
            if(is_array($studios))
               foreach ($studios as $key) {
                  echo "<tr><td>{$key->getName()}</td>";
                  echo "<td>{$key->getAbout()}</td>";
                  echo "<td>{$key->getWebsite()}</td>";
                  echo "<td>{$key->getFacebook()}</td>";
                  echo "<td>{$key->getTwitter()}</td>";
                  echo "<td>{$key->getYoutube()}</td>";
                  echo "<td>{$key->getCountry()}</td>";
                  echo "<td>{$key->getEstate()}</td>";
                  echo "<td>{$key->getCity()}</td>";
                  echo "<td>{$key->getDistrict()}</td>";
                  echo "<td>{$key->getStreet()}</td>";
                  echo "<td>{$key->getNumber()}</td>";
                  echo "<td>{$key->getComplement()}</td>";
                  echo "<td>{$key->getZipcode()}</td>";
                  echo "<td>{$key->getPhone()}</td>";
                  echo "<td>{$key->getPhoneAuxiliar()}</td>";
                  echo "<td>{$key->getContactEmail()}</td></tr>";
               }
               else
                  echo "<tr><td colspan=20>No data found</td></tr>"
            ?>
      </table>
      <pre><code>
         <?php 
            //var_dump($studios);
         ?>
      </code></pre>
   </div>

   <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>