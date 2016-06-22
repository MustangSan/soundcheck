<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <title>Events</title>

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
   <h1>Events</h1>

   <div id="body">
      <table>
         <tr>
            <th>IdEvent</th>
            <th>IdVenue</th>
            <th>Name</th>
            <th>About</th>
            <th>Website</th>
            <th>Facebook</th>
            <th>Twitter</th>
            <th>Youtube</th>
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
            <th>Phone Auxiliar</th>
            <th>Contact Email</th>
            <th></th>
         </tr>
            <?php 
            if(!empty($event)) {
                  echo "<tr><td>{$event->getIdEvent()}</td>";
                  echo "<td>{$event->getIdVenue()}</td>";
                  echo "<td>{$event->getName()}</td>";
                  echo "<td>{$event->getAbout()}</td>";
                  echo "<td>{$event->getWebsite()}</td>";
                  echo "<td>{$event->getFacebook()}</td>";
                  echo "<td>{$event->getTwitter()}</td>";
                  echo "<td>{$event->getYoutube()}</td>";
                  echo "<td>{$event->getPlace()}</td>";
                  echo "<td>{$event->getDate()}</td>";
                  echo "<td>{$event->getCountry()}</td>";
                  echo "<td>{$event->getEstate()}</td>";
                  echo "<td>{$event->getCity()}</td>";
                  echo "<td>{$event->getDistrict()}</td>";
                  echo "<td>{$event->getStreet()}</td>";
                  echo "<td>{$event->getNumber()}</td>";
                  echo "<td>{$event->getComplement()}</td>";
                  echo "<td>{$event->getZipcode()}</td>";
                  echo "<td>{$event->getPhone()}</td>";
                  echo "<td>{$event->getPhoneAuxiliar()}</td>";
                  echo "<td>{$event->getContactEmail()}</td>";
               }
               else
                  echo "<tr><td colspan=22>No data found</td></tr>";
            ?>
      </table>
      <pre><code>
         <?php 
            //var_dump($events);
         ?>
      </code></pre>
   </div>

   <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
</body>
</html>