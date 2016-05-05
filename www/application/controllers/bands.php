<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER BAND
 *---------------------------------------------------------------
 *
 *
 *
 */

class Bands extends CI_Controller {

    private $band;

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('form_validation');

        $this->load->model('Band_model', 'Band');
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
                if(!empty($this->band))
                    unlink('./content-uploaded/'.$this->band->getPhoto());
                
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
            if(empty($this->band)) {
                $this->form_validation->set_message('handle_upload', "You must upload an image!");
                return FALSE;
            }
            else
                $_POST['photo'] = $this->band->getPhoto();
        }
    }

    public function index() {
        $this->Band->startDatabase();
        $data['bands'] = $this->Band->readBands();
        $this->Band->closeDatabase();
        $this->load->view('band/band_list_view', $data);
    }

    public function createBand() {
        $this->form_validation->set_rules('photo', 'Photo', 'callback_handle_upload');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('about', 'About', 'trim|required');
        $this->form_validation->set_rules('website', 'Website', 'trim');
        $this->form_validation->set_rules('facebook', 'Facebook', 'trim');
        $this->form_validation->set_rules('twitter', 'Twitter', 'trim');
        $this->form_validation->set_rules('youtube', 'Youtube', 'trim');
        $this->form_validation->set_rules('myspace', 'Myspace', 'trim');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('estate', 'Estate', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim');
        $this->form_validation->set_rules('contactEmail', 'Contact Email', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'name'          => $this->input->post('name'),
                            'about'         => $this->input->post('about'),
                            'website'       => $this->input->post('website'),
                            'facebook'      => $this->input->post('facebook'),
                            'twitter'       => $this->input->post('twitter'),
                            'youtube'       => $this->input->post('youtube'),
                            'myspace'       => $this->input->post('myspace'),
                            'country'       => $this->input->post('country'),
                            'estate'        => $this->input->post('estate'),
                            'city'          => $this->input->post('city'),
                            'phone'         => $this->input->post('phone'),
                            'contactEmail'  => $this->input->post('contactEmail')
                        );
            $this->load->view('band/band_create_view', $data);
        }
        else {
            $data = new Band ([ NULL,
                                $this->input->post('name'),
                                $this->input->post('about'),
                                $this->input->post('photo'),
                                $this->input->post('website'),
                                $this->input->post('facebook'),
                                $this->input->post('twitter'),
                                $this->input->post('youtube'),
                                $this->input->post('myspace'),
                                $this->input->post('country'),
                                $this->input->post('estate'),
                                $this->input->post('city'),
                                $this->input->post('phone'),
                                $this->input->post('contactEmail')
                            ]);
            $this->Band->startDatabase();
            $result = $this->Band->createBand($data);
            $this->Band->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('bands');
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('bands');
            }
        }
    }

    public function updateBand($id) {
        $this->Band->startDatabase();
        $this->band = $this->Band->getBand($id);
        $this->Band->closeDatabase();
        
        if(!empty($this->band)) {
            $this->form_validation->set_rules('photo', 'Photo', 'callback_handle_upload');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('about', 'About', 'trim|required');
            $this->form_validation->set_rules('website', 'Website', 'trim');
            $this->form_validation->set_rules('facebook', 'Facebook', 'trim');
            $this->form_validation->set_rules('twitter', 'Twitter', 'trim');
            $this->form_validation->set_rules('youtube', 'Youtube', 'trim');
            $this->form_validation->set_rules('myspace', 'Myspace', 'trim');
            $this->form_validation->set_rules('country', 'Country', 'trim|required');
            $this->form_validation->set_rules('estate', 'Estate', 'trim|required');
            $this->form_validation->set_rules('city', 'City', 'trim|required');
            $this->form_validation->set_rules('phone', 'Phone', 'trim');
            $this->form_validation->set_rules('contactEmail', 'Contact Email', 'trim|required');

            if($this->form_validation->run() == FALSE) {
                $data = array(  'name'          => $this->band->getName(),
                                'about'         => $this->band->getAbout(),
                                'website'       => $this->band->getWebsite(),
                                'facebook'      => $this->band->getFacebook(),
                                'twitter'       => $this->band->getTwitter(),
                                'youtube'       => $this->band->getYoutube(),
                                'myspace'       => $this->band->getMyspace(),
                                'country'       => $this->band->getCountry(),
                                'estate'        => $this->band->getEstate(),
                                'city'          => $this->band->getCity(),
                                'phone'         => $this->band->getPhone(),
                                'contactEmail'  => $this->band->getContactEmail()
                            );
                $this->load->view('band/band_update_view', $data);
            }
            else {
                $data = new Band ([ $this->band->getIdBand(),
                                    $this->input->post('name'),
                                    $this->input->post('about'),
                                    $this->input->post('photo'),
                                    $this->input->post('website'),
                                    $this->input->post('facebook'),
                                    $this->input->post('twitter'),
                                    $this->input->post('youtube'),
                                    $this->input->post('myspace'),
                                    $this->input->post('country'),
                                    $this->input->post('estate'),
                                    $this->input->post('city'),
                                    $this->input->post('phone'),
                                    $this->input->post('contactEmail')
                                ]);
                $this->Band->startDatabase();
                $result = $this->Band->updateBand($data);
                $this->Band->closeDatabase();

                if($result) {
                    $this->session->set_flashdata('result', 'updateSuccess');
                    redirect('bands');
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('bands');
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }
}