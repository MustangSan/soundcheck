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

    public function upgradeAccount() {
        switch ($this->session->userdata('user')['permission']) {
            case 'musician':
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
                    $data = array(  'agencyName'        => $this->input->post('agencyName'),
                                    'description'       => $this->input->post('description'),
                                    'website'           => $this->input->post('website'),
                                    'facebook'          => $this->input->post('facebook'),
                                    'twitter'           => $this->input->post('twitter'),
                                    'youtube'           => $this->input->post('youtube'),
                                    'myspace'           => $this->input->post('myspace'),
                                    'phone'             => $this->input->post('phone'),
                                    'contactEmail'      => $this->input->post('contactEmail')
                                );
                    $this->load->view('user/manager_upgrade_view', $data);
                }
                else {
                    $data = new Manager ([  $this->input->post('agencyName'),
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
                    $result = $this->User->upgradeToManager($data, $this->session->userdata('user')['idUser']);
                    $this->User->closeDatabase();
                    if($result) {
                        $this->session->set_flashdata('result', 'createSuccess');
                        redirect('home');
                    }
                    else {
                        $this->session->set_flashdata('result', 'createError');
                        redirect('home');
                    }
                } 
                break;
            
            case 'manager':
                $this->form_validation->set_rules('biography', 'Biography', 'trim|required');
                $this->form_validation->set_rules('website', 'Website', 'trim');
                $this->form_validation->set_rules('facebook', 'Facebook', 'trim');
                $this->form_validation->set_rules('twitter', 'Twitter', 'trim');
                $this->form_validation->set_rules('youtube', 'Youtube', 'trim');
                $this->form_validation->set_rules('myspace', 'Myspace', 'trim');

                if($this->form_validation->run() == FALSE) {
                    $data = array(  'biography'         => $this->input->post('biography'),
                                    'website'           => $this->input->post('website'),
                                    'facebook'          => $this->input->post('facebook'),
                                    'twitter'           => $this->input->post('twitter'),
                                    'youtube'           => $this->input->post('youtube'),
                                    'myspace'           => $this->input->post('myspace')
                                );
                    $this->load->view('user/musician_upgrade_view', $data);
                }
                else {
                    $data = new Musician ([ $this->input->post('biography'),
                                            $this->input->post('website'),
                                            $this->input->post('facebook'),
                                            $this->input->post('twitter'),
                                            $this->input->post('youtube'),
                                            $this->input->post('myspace')
                                        ]);
                    $this->User->startDatabase();
                    $result = $this->User->upgradeToMusician($data, $this->session->userdata('user')['idUser']);
                    $this->User->closeDatabase();

                    if($result) {
                        $this->session->set_flashdata('result', 'createSuccess');
                        redirect('home');
                    }
                    else {
                        $this->session->set_flashdata('result', 'createError');
                        redirect('home');
                    }
                }
                break;
        }
    }
}
