<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER EVENT
 *---------------------------------------------------------------
 *
 *
 *
 */

class Events extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('form_validation');

        $this->load->model('Event_model', 'Event');
        $this->load->model('Login_user_model', 'Login');

        if(!$this->Login->is_logged())
            redirect('login', 'refresh');
    }

    public function index() {
        $this->Event->startDatabase();
        $data['events'] = $this->Event->readEvents();
        $this->Event->closeDatabase();
        $this->load->view('event/event_list_view', $data);
    }

    public function createEvent() {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('about', 'About', 'trim|required');
        $this->form_validation->set_rules('website', 'Website', 'trim');
        $this->form_validation->set_rules('facebook', 'Facebook', 'trim');
        $this->form_validation->set_rules('twitter', 'Twitter', 'trim');
        $this->form_validation->set_rules('youtube', 'Youtube', 'trim');
        $this->form_validation->set_rules('place', 'Place', 'trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
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
                            'place'             => $this->input->post('place'),
                            'date'              => $this->input->post('date'),
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
            $this->load->view('event/event_create_view', $data);
        }
        else {
            $data = new Event ([NULL,1,
                                $this->input->post('name'),
                                $this->input->post('about'),
                                $this->input->post('website'),
                                $this->input->post('facebook'),
                                $this->input->post('twitter'),
                                $this->input->post('youtube'),
                                $this->input->post('place'),
                                $this->input->post('date'),
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
            $this->Event->startDatabase();
            $result = $this->Event->createEvent($data);
            $this->Event->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('events');
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('events');
            }
        }
    }

    public function updateEvent($id) {
        $this->Event->startDatabase();
        $event = $this->Event->getEvent($id);
        $this->Event->closeDatabase();

        if(!empty($event)) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('about', 'About', 'trim|required');
            $this->form_validation->set_rules('website', 'Website', 'trim');
            $this->form_validation->set_rules('facebook', 'Facebook', 'trim');
            $this->form_validation->set_rules('twitter', 'Twitter', 'trim');
            $this->form_validation->set_rules('youtube', 'Youtube', 'trim');
            $this->form_validation->set_rules('place', 'Place', 'trim|required');
            $this->form_validation->set_rules('date', 'Date', 'trim|required');
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
                $data = array(  'name'              => $event->getName(),
                                'about'             => $event->getAbout(),
                                'website'           => $event->getWebsite(),
                                'facebook'          => $event->getFacebook(),
                                'twitter'           => $event->getTwitter(),
                                'youtube'           => $event->getYoutube(),
                                'place'             => $event->getPlace(),
                                'date'              => $event->getDate(),
                                'country'           => $event->getCountry(),
                                'estate'            => $event->getEstate(),
                                'city'              => $event->getCity(),
                                'district'          => $event->getDistrict(),
                                'street'            => $event->getStreet(),
                                'number'            => $event->getNumber(),
                                'complement'        => $event->getComplement(),
                                'zipcode'           => $event->getZipcode(),
                                'phone'             => $event->getPhone(),
                                'phoneAuxiliar'     => $event->getPhoneAuxiliar(),
                                'contactEmail'      => $event->getContactEmail()
                            );
                $this->load->view('event/event_update_view', $data);
            }
            else {
                $data = new Event ([$event->getIdEvent(),
                                    $event->getIdUser(),
                                    $this->input->post('name'),
                                    $this->input->post('about'),
                                    $this->input->post('website'),
                                    $this->input->post('facebook'),
                                    $this->input->post('twitter'),
                                    $this->input->post('youtube'),
                                    $this->input->post('place'),
                                    $this->input->post('date'),
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
                $this->Event->startDatabase();
                $result = $this->Event->updateEvent($data);
                $this->Event->closeDatabase();

                if($result) {
                    $this->session->set_flashdata('result', 'updateSuccess');
                    redirect('events');
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('events');
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }
}