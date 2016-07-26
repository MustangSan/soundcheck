<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soundcheck</title>
    <!-- Core CSS - Include with every page -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/main-style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/plugins/timeline/timeline.css" rel="stylesheet" />
    
    <link href="<?php echo base_url(); ?>assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />

    <link href="<?php echo base_url(); ?>assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    <link href="<?php echo base_url(); ?>assets/plugins/social-buttons/social-buttons.css" rel="stylesheet" />

    <script src="<?php echo base_url(); ?>assets/plugins/jquery-1.10.2.js"></script>

    <style type="text/css">

        .logo-ini {
            width: 250px;
            height: auto;
            margin-top: -75px;
        }

        .logo-ini-sign-up {
            width: 180px;
            height: auto;
            margin-bottom: -38px;
        }

        .navbar-brand img {
            height: 90px;
            margin-left: 40px;
            top: 2px;
            position: absolute;
        }

        .navbar-default {
            border-color: rgb(83, 163, 163);
        }

        .page-header {
            margin: 50px 0 20px;
        }

        .fieldErrorLogin {
            width: 16px;
            height: 13px;
            float: right;
            left: -12px;
            top: -26px;
            margin-bottom: -13px;
            position: relative;
            z-index: 1000;
            cursor: help;
        }

        .alert {
            top: -22px;
            right: 0 !important;
            margin: 15px 40px;
            max-width: 300px;
            position: absolute;
            z-index: 100000;
            -webkit-box-shadow: 0px 0px 40px rgba(0, 0, 0, 0.75);
            -moz-box-shadow:    0px 0px 40px rgba(0, 0, 0, 0.75);
            box-shadow:         0px 0px 40px rgba(0, 0, 0, 0.75);

            -webkit-animation-name: shake;
            -webkit-animation-fill-mode: both;
            -webkit-animation-duration: 1s;
            -webkit-animation-iteration-count: 1;
            -webkit-animation-timing-function: linear;

            -moz-animation-name: shake;
            -moz-animation-fill-mode: both;
            -moz-animation-duration: 1s;
            -moz-animation-iteration-count: 1;
            -moz-animation-timing-function: linear;

            animation-name: shake;
            animation-fill-mode: both;
            animation-duration: 1s;
            animation-iteration-count: 1;
            animation-timing-function: linear;
        }

        .sign-upClass {
            float: right;
            margin-top: -21px;
            border-radius: 5px;
            padding: 3px 6px;
        }

        .create-btn {
            float: right;
            margin-top: -2px;
            border-radius: 5px;
            padding: 3px 6px;
        }

        .logo-margin-10 {
            margin-top: 15px;
        }

        .singup-panel {
            margin-top: 5%;
        }

        .perfil-photo {
            width: 110px;
            height: 110px;
        }

        .perfil-photo img {
            width: 110px;
            height: auto;
        }

        .user-section {
            margin-top: 40px;
        }

        .user-section-inner {
            float: none;
            -moz-border-radius: 7px;
            -webkit-border-radius: 7px;
            border-radius: 7px;
        }

        .user-section-inner img {
            margin-left: 0;
        }

        .photo-center {
            margin-left: 71px;
        }

        .user-info {
            display: block;
        }

        .submenu {
            margin-left: 17px;
        }

        .profile-photo {
            
            margin-left: 22px;
            margin-bottom: 10px;
            width: 200px;
            height: auto;
            -moz-border-radius: 7px;
            -webkit-border-radius: 7px;
            border-radius: 7px;
        }
    </style>
</head>

