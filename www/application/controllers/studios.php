<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER STUDIO
 *---------------------------------------------------------------
 *
 *
 *
 */

class Studios extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('form_validation');

        $this->load->model('Studio_model', 'Studio');
        $this->load->model('Login_user_model', 'Login');

        if(!$this->Login->is_logged())
            redirect('login', 'refresh');

        if($this->session->userdata('user')['permission'] !== 'manager' || $this->session->userdata('user')['permission'] !== 'M&M')
            redirect('home', 'refresh');
    }

    public function index() {
        $this->Studio->startDatabase();
        $data['studios'] = $this->Studio->readStudios();
        $this->Studio->closeDatabase();
        $this->load->view('studio/studio_list_view', $data);
    }

    public function createStudio() {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('about', 'About', 'trim|required');
        $this->form_validation->set_rules('website', 'Website', 'trim');
        $this->form_validation->set_rules('facebook', 'Facebook', 'trim');
        $this->form_validation->set_rules('twitter', 'Twitter', 'trim');
        $this->form_validation->set_rules('youtube', 'Youtube', 'trim');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('estate', 'Estate', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('district', 'District', 'trim|required');
        $this->form_validation->set_rules('street', 'Street', 'trim|required');
        $this->form_validation->set_rules('number', 'Number', 'trim|required');
        $this->form_validation->set_rules('complement', 'Complement', 'trim');
        $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('phoneAuxiliar', 'Phone Auxiliar', 'trim');
        $this->form_validation->set_rules('contactEmail', 'Contact Email', 'trim|required|valid_email');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'name'              => $this->input->post('name'),
                            'about'             => $this->input->post('about'),
                            'website'           => $this->input->post('website'),
                            'facebook'          => $this->input->post('facebook'),
                            'twitter'           => $this->input->post('twitter'),
                            'youtube'           => $this->input->post('youtube'),
                            'country'           => $this->input->post('country'),
                            'estate'            => $this->input->post('estate'),
                            'city'              => $this->input->post('city'),
                            'district'          => $this->input->post('district'),
                            'street'            => $this->input->post('street'),
                            'number'            => $this->input->post('number'),
                            'complement'        => $this->input->post('complement'),
                            'zipcode'           => $this->input->post('zipcode'),
                            'phone'             => $this->input->post('phone'),
                            'phoneAuxiliar'     => $this->input->post('phoneAuxiliar'),
                            'contactEmail'      => $this->input->post('contactEmail')
                        );
            $this->load->view('studio/studio_create_view', $data);
        }
        else {
            $data = new Studio ([   NULL,1,
                                    $this->input->post('name'),
                                    $this->input->post('about'),
                                    $this->input->post('website'),
                                    $this->input->post('facebook'),
                                    $this->input->post('twitter'),
                                    $this->input->post('youtube'),
                                    $this->input->post('country'),
                                    $this->input->post('estate'),
                                    $this->input->post('city'),
                                    $this->input->post('district'),
                                    $this->input->post('street'),
                                    $this->input->post('number'),
                                    $this->input->post('complement'),
                                    $this->input->post('zipcode'),
                                    $this->input->post('phone'),
                                    $this->input->post('phoneAuxiliar'),
                                    $this->input->post('contactEmail')
                                ]);
            $this->Studio->startDatabase();
            $result = $this->Studio->createStudio($data);
            $this->Studio->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('studios');
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('studios');
            }
        }
    }

    public function updateStudio($id) {
        $this->Studio->startDatabase();
        $studio = $this->Studio->getStudio($id);
        $this->Studio->closeDatabase();

        if(!empty($studio)) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('about', 'About', 'trim|required');
            $this->form_validation->set_rules('website', 'Website', 'trim');
            $this->form_validation->set_rules('facebook', 'Facebook', 'trim');
            $this->form_validation->set_rules('twitter', 'Twitter', 'trim');
            $this->form_validation->set_rules('youtube', 'Youtube', 'trim');
            $this->form_validation->set_rules('country', 'Country', 'trim|required');
            $this->form_validation->set_rules('estate', 'Estate', 'trim|required');
            $this->form_validation->set_rules('city', 'City', 'trim|required');
            $this->form_validation->set_rules('district', 'District', 'trim|required');
            $this->form_validation->set_rules('street', 'Street', 'trim|required');
            $this->form_validation->set_rules('number', 'Number', 'trim|required');
            $this->form_validation->set_rules('complement', 'Complement', 'trim');
            $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
            $this->form_validation->set_rules('phoneAuxiliar', 'Phone Auxiliar', 'trim');
            $this->form_validation->set_rules('contactEmail', 'Contact Email', 'trim|required|valid_email');

            if($this->form_validation->run() == FALSE) {
                $data = array(  'name'              => $studio->getName(),
                                'about'             => $studio->getAbout(),
                                'website'           => $studio->getWebsite(),
                                'facebook'          => $studio->getFacebook(),
                                'twitter'           => $studio->getTwitter(),
                                'youtube'           => $studio->getYoutube(),
                                'country'           => $studio->getCountry(),
                                'estate'            => $studio->getEstate(),
                                'city'              => $studio->getCity(),
                                'district'          => $studio->getDistrict(),
                                'street'            => $studio->getStreet(),
                                'number'            => $studio->getNumber(),
                                'complement'        => $studio->getComplement(),
                                'zipcode'           => $studio->getZipcode(),
                                'phone'             => $studio->getPhone(),
                                'phoneAuxiliar'     => $studio->getPhoneAuxiliar(),
                                'contactEmail'      => $studio->getContactEmail()
                            );
                $this->load->view('studio/studio_update_view', $data);
            }
            else {
                $data = new Studio ([   $studio->getIdStudio(),
                                        $studio->getIdUser(),
                                        $this->input->post('name'),
                                        $this->input->post('about'),
                                        $this->input->post('website'),
                                        $this->input->post('facebook'),
                                        $this->input->post('twitter'),
                                        $this->input->post('youtube'),
                                        $this->input->post('country'),
                                        $this->input->post('estate'),
                                        $this->input->post('city'),
                                        $this->input->post('district'),
                                        $this->input->post('street'),
                                        $this->input->post('number'),
                                        $this->input->post('complement'),
                                        $this->input->post('zipcode'),
                                        $this->input->post('phone'),
                                        $this->input->post('phoneAuxiliar'),
                                        $this->input->post('contactEmail')
                                    ]);
                $this->Studio->startDatabase();
                $result = $this->Studio->updateStudio($data);
                $this->Studio->closeDatabase();

                if($result) {
                    $this->session->set_flashdata('result', 'updateSuccess');
                    redirect('studios');
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('studios');
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }
}