<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER MEMBER
 *---------------------------------------------------------------
 *
 *
 *
 */

class Members extends CI_Controller {

    private $member;

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('form_validation');

        $this->load->model('Member_model', 'Member');
        $this->load->model('Login_user_model', 'Login');

        if(!$this->Login->is_logged())
            redirect('login', 'refresh');

        if($this->session->userdata('user')['permission'] !== 'musician' || $this->session->userdata('user')['permission'] !== 'M&M')
            redirect('home', 'refresh');

        $config['upload_path']      = './content-uploaded/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 900;
        $config['max_width']        = 300;
        $config['max_height']       = 300;
        $this->load->library('upload', $config);
    }

    public function handle_upload() {
        if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {
            if ($this->upload->do_upload('photo')) {
                if(!empty($this->member))
                    unlink('./content-uploaded/'.$this->member->getPhoto());
                
                $upload_data    = $this->upload->data();
                $_POST['photo'] = $upload_data['file_name'];
                return TRUE;
            }
            else {
                $this->form_validation->set_message('handle_upload', $this->upload->display_errors());
                return FALSE;
            }
            return TRUE;
        }
        else {
            if(empty($this->member)) {
                $this->form_validation->set_message('handle_upload', "You must upload an image!");
                return FALSE;
            }
            else
                $_POST['photo'] = $this->member->getPhoto();
        }
    }

    public function index() {
        $this->Member->startDatabase();
        $data['members'] = $this->Member->readMembers();
        $this->Member->closeDatabase();
        $this->load->view('member/member_list_view', $data);
    }

    public function createMember() {
        $this->form_validation->set_rules('photo', 'Photo', 'callback_handle_upload');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('instrument', 'Instrument', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'name'          => $this->input->post('name'),
                            'instrument'    => $this->input->post('instrument')
                        );
            $this->load->view('member/member_create_view', $data);
        }

        else {
            $data = new Member ([   NULL,1,
                                    $this->input->post('name'),
                                    $this->input->post('photo'),
                                    $this->input->post('instrument')
                                ]);
            $this->Member->startDatabase();
            $result = $this->Member->createMember($data);
            $this->Member->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('members');
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('members');
            }
        }
    }

    public function updateMember($id) {
        $this->Member->startDatabase();
        $this->member = $this->Member->getMember($id);
        $this->Member->closeDatabase();

        if(!empty($this->member)) {
            $this->form_validation->set_rules('photo', 'Photo', 'callback_handle_upload');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('instrument', 'Instrument', 'trim|required');

            if($this->form_validation->run() == FALSE) {
                $data = array(  'name'          => $this->member->getName(),
                                'instrument'    => $this->member->getInstrument()
                            );
                $this->load->view('member/member_update_view', $data);
            }

            else {
                $data = new Member ([   $this->member->getIdMember(),
                                        $this->member->getIdBand(),
                                        $this->input->post('name'),
                                        $this->input->post('photo'),
                                        $this->input->post('instrument')
                                    ]);
                $this->Member->startDatabase();
                $result = $this->Member->updateMember($data);
                $this->Member->closeDatabase();

                if($result) {
                    $this->session->set_flashdata('result', 'updateSuccess');
                    redirect('members');
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('members');
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }
}