<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER VENUE
 *---------------------------------------------------------------
 *
 *
 *
 */

class Venues extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('form_validation');

        $this->load->model('Venue_model', 'Venue');
    }

    public function index() {
        $this->Venue->startDatabase();
        $data['venues'] = $this->Venue->readVenues();
        $this->Venue->closeDatabase();
        $this->load->view('venue/venue_list_view', $data);
    }

    public function createVenue() {
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
            $this->load->view('venue/venue_create_view', $data);
        }
        else {
            $data = new Venue ([NULL,1,
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
            $this->Venue->startDatabase();
            $result = $this->Venue->createVenue($data);
            $this->Venue->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('venues');
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('venues');
            }
        }
    }

    public function updateVenue($id) {
        $this->Venue->startDatabase();
        $venue = $this->Venue->getVenue($id);
        $this->Venue->closeDatabase();

        if(!empty($venue)) {
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
                $data = array(  'name'              => $venue->getName(),
                                'about'             => $venue->getAbout(),
                                'website'           => $venue->getWebsite(),
                                'facebook'          => $venue->getFacebook(),
                                'twitter'           => $venue->getTwitter(),
                                'youtube'           => $venue->getYoutube(),
                                'country'           => $venue->getCountry(),
                                'estate'            => $venue->getEstate(),
                                'city'              => $venue->getCity(),
                                'district'          => $venue->getDistrict(),
                                'street'            => $venue->getStreet(),
                                'number'            => $venue->getNumber(),
                                'complement'        => $venue->getComplement(),
                                'zipcode'           => $venue->getZipcode(),
                                'phone'             => $venue->getPhone(),
                                'phoneAuxiliar'     => $venue->getPhoneAuxiliar(),
                                'contactEmail'      => $venue->getContactEmail()
                            );
                $this->load->view('venue/venue_update_view', $data);
            }
            else {
                $data = new Venue ([$venue->getIdVenue(),
                                    $venue->getIdUser(),
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
                $this->Venue->startDatabase();
                $result = $this->Venue->updateVenue($data);
                $this->Venue->closeDatabase();

                if($result) {
                    $this->session->set_flashdata('result', 'updateSuccess');
                    redirect('venues');
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('venues');
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }
}