<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER LOGOUT
 *---------------------------------------------------------------
 *
 *
 *
 */

class Logout extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->library('session');
    }

    function index() {
        $this->session->unset_userdata('admin');

        redirect('administration/login');
    }
}