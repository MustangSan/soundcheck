<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER LOGIN
 *---------------------------------------------------------------
 *
 *
 *
 */

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->model('Login_user_model', 'Login');
    }

    public function index() {
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('login/login_view');
        }
        else {
            $query = $this->Login->sing_in();

            if(isset($query) && !empty($query)) {
                $user = array(  'name'              => $query->name,
                                'email'             => $query->email,
                                'idUser'            => $query->idUser,
                                'permission'        => 'manager'
                            );
                $data = array('user' => $user);
                $this->session->set_userdata($data);
                redirect('home', 'refresh');
            }
            else {
                $data['result'] = 'loginError';
                $this->load->view('login/login_view', $data);
            }
        }
    }
}