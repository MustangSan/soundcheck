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

        if($this->session->userdata('user')['permission'] !== 'musician' && $this->session->userdata('user')['permission'] !== 'M&M')
            redirect('home', 'refresh');

        $config['upload_path']      = './content-uploaded/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 3000;
        $config['max_width']        = 1000;
        $config['max_height']       = 1000;
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
        redirect('home', 'refresh');
        /*$this->Member->startDatabase();
        $data['members'] = $this->Member->readMembers();
        $this->Member->closeDatabase();
        $this->load->view('member/member_list_view', $data);*/
    }

    public function bandMembers($idBand) {
        if(!isset($idBand) || empty($idBand))
            redirect('home', 'refresh');
        
        $data['idBand'] = $idBand;
        $this->Member->startDatabase();
        $data['members'] = $this->Member->readMembers($idBand);
        $data['membersSignup'] = $this->Member->readMembersSignup($idBand);
        $this->Member->closeDatabase();
        $this->load->view('member/member_list_view', $data);
    }

    public function createMember($idBand = NULL) {
        if(!isset($idBand) || empty($idBand))
            redirect('home', 'refresh');

        $this->form_validation->set_rules('photo', 'Photo', 'callback_handle_upload');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('instrument', 'Instrument', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'name'          => $this->input->post('name'),
                            'instrument'    => $this->input->post('instrument')
                        );
            $data['idBand'] = $idBand;
            $this->load->view('member/member_create_view', $data);
        }

        else {
            $data = new Member ([   NULL,
                                    $idBand,
                                    $this->input->post('name'),
                                    $this->input->post('photo'),
                                    $this->input->post('instrument')
                                ]);
            $this->Member->startDatabase();
            $result = $this->Member->createMember($data);
            $this->Member->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('members/bandMembers/'.$idBand);
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('members/bandMembers/'.$idBand);
            }
        }
    }

    public function updateMember($id) {
        if(!isset($id) || empty($id))
            redirect('home', 'refresh');

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
                $data['idBand'] = $this->member->getIdBand();
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
                    redirect('members/bandMembers/'.$this->member->getIdBand());
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('members/bandMembers/'.$this->member->getIdBand());
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }

    public function insertMember($idBand = NULL) {
        if(!isset($idBand) || empty($idBand))
            redirect('home', 'refresh');

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('instrument', 'Instrument', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $data['idBand'] = $idBand;
            $data['instrument'] = $this->input->post('instrument');
            $this->load->view('member/member_insertMember_view', $data);
        }
        else {
            $this->Member->startDatabase();
            $result = $this->Member->insertBandMember($this->input->post('username'), $idBand, $this->input->post('instrument'));
            $this->Member->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('members/bandMembers/'.$idBand);
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('members/bandMembers/'.$idBand);
            }
        }
    }

    public function updateInstrument($idBand = NULL, $idUser = NULL) {
        if((!isset($idBand) || empty($idBand)) || (!isset($idUser) || empty($idUser)))
            redirect('home', 'refresh');

        $this->form_validation->set_rules('instrument', 'Instrument', 'trim|required');

        $this->Member->startDatabase();
        $data['instrument'] = $this->Member->getMemberInstrument($idBand,$idUser);
        $this->Member->closeDatabase();

        if($this->form_validation->run() == FALSE) {
            $data['idBand'] = $idBand;
            $this->load->view('member/member_updateInstrument_view', $data);
        }
        else {
            $data = array(  'idBand'     => $idBand,
                            'idUser'     => $idUser,
                            'instrument' => $this->input->post('instrument')
                        );
            $this->Member->startDatabase();
            $result = $this->Member->uptadeSignUpMember($data);
            $this->Member->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('members/bandMembers/'.$idBand);
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('members/bandMembers/'.$idBand);
            }
        }
    }
}