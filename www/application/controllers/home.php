<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER HOME
 *---------------------------------------------------------------
 *
 *
 *
 */

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->model('User_model', 'User');
        $this->load->model('Login_user_model', 'Login');

        if(!$this->Login->is_logged())
            redirect('login', 'refresh');
    }

    public function index() {
        $this->load->view('user/home_view');
    }
}
