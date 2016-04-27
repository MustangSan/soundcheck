<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER INDEX
 *---------------------------------------------------------------
 *
 *
 *
 */

class Index extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('index_view');
    }
}