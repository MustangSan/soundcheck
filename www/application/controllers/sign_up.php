<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER SING UP
 *---------------------------------------------------------------
 *
 *
 *
 */

class Sign_up extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('form_validation');

        $this->load->model('User_model', 'User');
    }

    public function index() {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('accountType', 'Account Type', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'name'          => $this->input->post('name'),
                            'email'         => $this->input->post('email'),
                            'accountType'   => $this->input->post('accountType')
                        );
            $this->load->view('signup/registration_view', $data);
        }
        else{
            $data = array(  'name'          => $this->input->post('name'),
                            'email'         => $this->input->post('email')
                        );
            $this->session->set_userdata($data);
            switch ($this->input->post('accountType')) {
                case 'Fa':
                    redirect('sign_up/createFa');
                    break;
                case 'Musician':
                    redirect('sign_up/createMusician');
                    break;
                case 'Manager':
                    redirect('sign_up/createManager');
                    break;
                default:
                    $this->load->view('errors/html/error_404');
                    break;
            }
        }
    }

    public function createFa() {
        if($this->input->post('name') == '') {
            if(!(isset($_SESSION['email']) && isset($_SESSION['name'])))
                redirect('sign_up');

            $_POST['name'] = $this->session->userdata('name');
            $_POST['email'] = $this->session->userdata('email');

            $this->session->unset_userdata(['name', 'email']);
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|md5');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('photo', 'Photo', 'trim|required');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('estate', 'Estate', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required');
        $this->form_validation->set_rules('registeredDate', 'Registered Date', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'email'             => $this->input->post('email'),
                            'name'              => $this->input->post('name'),
                            'photo'             => $this->input->post('photo'),
                            'country'           => $this->input->post('country'),
                            'estate'            => $this->input->post('estate'),
                            'city'              => $this->input->post('city'),
                            'zipcode'           => $this->input->post('zipcode'),
                            'registeredDate'    => $this->input->post('registeredDate'),
                            'status'            => $this->input->post('status')
                        );
            $this->load->view('user/fa_create_view', $data);
        }
        else {
            $data = new Fa ([   NULL,
                                $this->input->post('email'),
                                $this->input->post('password'),
                                $this->input->post('name'),
                                $this->input->post('photo'),
                                $this->input->post('country'),
                                $this->input->post('estate'),
                                $this->input->post('city'),
                                $this->input->post('zipcode'),
                                $this->input->post('registeredDate'),
                                'fa',
                                $this->input->post('status')
                            ]);
            $this->User->startDatabase();
            $result = $this->User->createFa($data);
            $this->User->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('login');
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('sign_up');
            }
        }
    }

    public function createMusician() {
        if($this->input->post('name') == '') {
            if(!(isset($_SESSION['email']) && isset($_SESSION['name'])))
                redirect('sign_up');

            $_POST['name'] = $this->session->userdata('name');
            $_POST['email'] = $this->session->userdata('email');

            $this->session->unset_userdata(['name', 'email']);
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|md5');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('photo', 'Photo', 'trim|required');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('estate', 'Estate', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required');
        $this->form_validation->set_rules('registeredDate', 'Registered Date', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('biography', 'Biography', 'trim|required');
        $this->form_validation->set_rules('website', 'Website', 'trim');
        $this->form_validation->set_rules('facebook', 'Facebook', 'trim');
        $this->form_validation->set_rules('twitter', 'Twitter', 'trim');
        $this->form_validation->set_rules('youtube', 'Youtube', 'trim');
        $this->form_validation->set_rules('myspace', 'Myspace', 'trim');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'email'             => $this->input->post('email'),
                            'name'              => $this->input->post('name'),
                            'photo'             => $this->input->post('photo'),
                            'country'           => $this->input->post('country'),
                            'estate'            => $this->input->post('estate'),
                            'city'              => $this->input->post('city'),
                            'zipcode'           => $this->input->post('zipcode'),
                            'registeredDate'    => $this->input->post('registeredDate'),
                            'status'            => $this->input->post('status'),
                            'biography'         => $this->input->post('biography'),
                            'website'           => $this->input->post('website'),
                            'facebook'          => $this->input->post('facebook'),
                            'twitter'           => $this->input->post('twitter'),
                            'youtube'           => $this->input->post('youtube'),
                            'myspace'           => $this->input->post('myspace')
                        );
            $this->load->view('user/musician_create_view', $data);
        }
        else {
            $data = new Musician ([ NULL,
                                    $this->input->post('email'),
                                    $this->input->post('password'),
                                    $this->input->post('name'),
                                    $this->input->post('photo'),
                                    $this->input->post('country'),
                                    $this->input->post('estate'),
                                    $this->input->post('city'),
                                    $this->input->post('zipcode'),
                                    $this->input->post('registeredDate'),
                                    'musician',
                                    $this->input->post('status'),
                                    $this->input->post('biography'),
                                    $this->input->post('website'),
                                    $this->input->post('facebook'),
                                    $this->input->post('twitter'),
                                    $this->input->post('youtube'),
                                    $this->input->post('myspace')
                                ]);
            $this->User->startDatabase();
            $result = $this->User->createMusician($data);
            $this->User->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('login');
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('sign_up');
            }
        }
    }

    public function createManager() {
        if($this->input->post('name') == '') {
            if(!(isset($_SESSION['email']) && isset($_SESSION['name'])))
                redirect('sign_up');

            $_POST['name'] = $this->session->userdata('name');
            $_POST['email'] = $this->session->userdata('email');

            $this->session->unset_userdata(['name', 'email']);
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|md5');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('photo', 'Photo', 'trim|required');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('estate', 'Estate', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required');
        $this->form_validation->set_rules('registeredDate', 'Registered Date', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('agencyName', 'Agency Name', 'trim');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('website', 'Website', 'trim');
        $this->form_validation->set_rules('facebook', 'Facebook', 'trim');
        $this->form_validation->set_rules('twitter', 'Twitter', 'trim');
        $this->form_validation->set_rules('youtube', 'Youtube', 'trim');
        $this->form_validation->set_rules('myspace', 'Myspace', 'trim');
        $this->form_validation->set_rules('phone', 'Phone', 'trim');
        $this->form_validation->set_rules('contactEmail', 'Contact Email', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'email'             => $this->input->post('email'),
                            'name'              => $this->input->post('name'),
                            'photo'             => $this->input->post('photo'),
                            'country'           => $this->input->post('country'),
                            'estate'            => $this->input->post('estate'),
                            'city'              => $this->input->post('city'),
                            'zipcode'           => $this->input->post('zipcode'),
                            'registeredDate'    => $this->input->post('registeredDate'),
                            'status'            => $this->input->post('status'),
                            'agencyName'        => $this->input->post('agencyName'),
                            'description'       => $this->input->post('description'),
                            'website'           => $this->input->post('website'),
                            'facebook'          => $this->input->post('facebook'),
                            'twitter'           => $this->input->post('twitter'),
                            'youtube'           => $this->input->post('youtube'),
                            'myspace'           => $this->input->post('myspace'),
                            'phone'             => $this->input->post('phone'),
                            'contactEmail'      => $this->input->post('contactEmail')
                        );
            $this->load->view('user/manager_create_view', $data);
        }
        else {
            $data = new Manager ([ NULL,
                                    $this->input->post('email'),
                                    $this->input->post('password'),
                                    $this->input->post('name'),
                                    $this->input->post('photo'),
                                    $this->input->post('country'),
                                    $this->input->post('estate'),
                                    $this->input->post('city'),
                                    $this->input->post('zipcode'),
                                    $this->input->post('registeredDate'),
                                    'manager',
                                    $this->input->post('status'),
                                    $this->input->post('agencyName'),
                                    $this->input->post('description'),
                                    $this->input->post('website'),
                                    $this->input->post('facebook'),
                                    $this->input->post('twitter'),
                                    $this->input->post('youtube'),
                                    $this->input->post('myspace'),
                                    $this->input->post('phone'),
                                    $this->input->post('contactEmail')
                                ]);
            $this->User->startDatabase();
            $result = $this->User->createManager($data);
            $this->User->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('login');
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('sign_up');
            }
        }
    }
}