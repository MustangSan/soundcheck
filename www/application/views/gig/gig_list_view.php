<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>Gigs</title>

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
   <h1>Gigs</h1>

   <div id="body">
      <p><a href="<?php echo base_url('gigs/createGig'); ?>">Create Gig</a></p>
      <table>
         <tr>
            <th>IdGig</th>
            <th>IdUser</th>
            <th>Description</th>
            <th>Status</th>
            <th>Place</th>
            <th>Date</th>
            <th>Country</th>
            <th>Estate</th>
            <th>City</th>
            <th>District</th>
            <th>Street</th>
            <th>Number</th>
            <th>Complement</th>
            <th>Zipcode</th>
            <th>Phone</th>
            <th>Contact Email</th>
            <th></th>
         </tr>
            <?php 
            if(is_array($gigs))
               foreach ($gigs as $key) {
                  echo "<tr><td>{$key->getIdGig()}</td>";
                  echo "<td>{$key->getIdUser()}</td>";
                  echo "<td>{$key->getDescription()}</td>";
                  echo "<td>{$key->getStatus()}</td>";
                  echo "<td>{$key->getPlace()}</td>";
                  echo "<td>{$key->getDate()}</td>";
                  echo "<td>{$key->getCountry()}</td>";
                  echo "<td>{$key->getEstate()}</td>";
                  echo "<td>{$key->getCity()}</td>";
                  echo "<td>{$key->getDistrict()}</td>";
                  echo "<td>{$key->getStreet()}</td>";
                  echo "<td>{$key->getNumber()}</td>";
                  echo "<td>{$key->getComplement()}</td>";
                  echo "<td>{$key->getZipcode()}</td>";
                  echo "<td>{$key->getPhone()}</td>";
                  echo "<td>{$key->getContactEmail()}</td>";
                  echo "<td><a href=\"".base_url('gigs/updateGig/'.$key->getIdGig())."\">Update</a><br/><a href=\"".base_url('gigs/details/'.$key->getIdGig())."\">Details</a></td></tr>";
               }
               else
                  echo "<tr><td colspan=17>No data found</td></tr>";
            ?>
      </table>
      <pre><code>
         <?php 
            //var_dump($gigs);
         ?>
      </code></pre>
   </div>

   <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>