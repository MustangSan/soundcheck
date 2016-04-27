<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER ADMINISTRATOR
 *---------------------------------------------------------------
 *
 *
 *
 */

class Administrators extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->library('Library');
        $this->load->library('form_validation');
        //$this->load->library('session');

        $this->load->model('Administrator_model', 'Admin');
        $this->load->model('Login_model', 'Login');

        if(!$this->Login->is_logged())
            redirect('administration/login', 'refresh');
    }

    public function index() {
        $this->Admin->startDatabase();
        $data['administrators'] = $this->Admin->readAdministrators();
        $this->Admin->closeDatabase();
        $this->load->view('administration/admin_list_view', $data);
    }

    public function createAdministrator() {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|md5');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'name'          => $this->input->post('name'),
                            'email'         => $this->input->post('email'),
                            'permission'    => $this->input->post('permission'),
                            'status'        => $this->input->post('status')
                        );
            $this->load->view('administration/admin_create_view', $data);
        }
        else {
            $data = new Administrator ([NULL,
                                        $this->input->post('email'),
                                        $this->input->post('password'),
                                        $this->input->post('name'),
                                        $this->input->post('permission'),
                                        $this->input->post('status')
                                    ]);
            $this->Admin->startDatabase();
            $result = $this->Admin->createAdministrator($data);
            $this->Admin->closeDatabase();
            
            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('administration/administrators');
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('administration/administrators');
            }
        }
    }

    public function updateAdministrator($id) {
        $this->Admin->startDatabase();
        $administrator = $this->Admin->getAdministrator($id);
        $this->Admin->closeDatabase();
        
        if(!empty($administrator)) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');

            if($this->form_validation->run() == FALSE) {
                $data = array(  'name'          => $administrator->getName(),
                                'email'         => $administrator->getEmail(),
                                'password'      => $administrator->getPassword(),
                                'permission'    => $administrator->getPermission(),
                                'status'        => $administrator->getStatus()
                            );
                $this->load->view('administration/admin_update_view', $data);
            }
            else {
                if ($this->input->post('password') != $administrator->getPassword())
                    $password = md5($this->input->post('password'));
                else
                    $password = $administrator->getPassword();

                $data = new Administrator ([$administrator->getIdAdministrator(),
                                            $this->input->post('email'),
                                            $password,
                                            $this->input->post('name'),
                                            $this->input->post('permission'),
                                            $this->input->post('status')
                                        ]);
                $this->Admin->startDatabase();
                $result = $this->Admin->updateAdministrator($data);
                $this->Admin->closeDatabase();

                if($result) {
                    $this->session->set_flashdata('result', 'updateSuccess');
                    redirect('administration/administrators');
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('administration/administrators');
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }
}