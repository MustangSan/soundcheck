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
        $this->load->model('Event_model', 'Event');
        $this->load->model('Login_user_model', 'Login');

        if(!$this->Login->is_logged())
            redirect('login', 'refresh');

        //if($this->session->userdata('user')['permission'] !== 'manager' && $this->session->userdata('user')['permission'] !== 'M&M')
            //redirect('home', 'refresh');
    }

    public function permissionTest() {
        if($this->session->userdata('user')['permission'] !== 'manager' && $this->session->userdata('user')['permission'] !== 'M&M')
            redirect('home', 'refresh');
    }

    public function index() {
        //redirect('home', 'refresh');
        $this->Venue->startDatabase();
        $data['venues'] = $this->Venue->readVenues();
        $this->Venue->closeDatabase();
        $this->load->view('venue/venue_search_view', $data);
    }

    public function myVenues() {
        $this->permissionTest();

        $idUser = $this->session->userdata('user')['idUser'];
        if(!isset($idUser) || empty($idUser))
            redirect('home', 'refresh');
        
        $data['idUser'] = $idUser;
        $this->Venue->startDatabase();
        $data['venues'] = $this->Venue->readVenues($idUser);
        $this->Venue->closeDatabase();
        $this->load->view('venue/venue_list_view', $data);
    }

    public function createVenue() {
        $this->permissionTest();

        $idUser = $this->session->userdata('user')['idUser'];
        if(!isset($idUser) || empty($idUser))
            redirect('home', 'refresh');

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
            $data['idUser'] = $idUser;
            $this->load->view('venue/venue_create_view', $data);
        }
        else {
            $data = new Venue ([NULL,
                                $idUser,
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
                redirect('venues/myVenues/'.$idUser);
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('venues/myVenues/'.$idUser);
            }
        }
    }

    public function updateVenue($id) {
        $this->permissionTest();
        
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
                $data['idUser'] = $venue->getIdUser();
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
                    redirect('venues/myVenues/'.$this->session->userdata('user')['idUser']);
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('venues/myVenues/'.$this->session->userdata('user')['idUser']);
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }

    public function profile($id) {
        $this->Venue->startDatabase();
        $venue = $this->Venue->getVenue($id);
        $this->Venue->closeDatabase();

        if(!empty($venue)) {
            $data['venue'] = $venue;
            $this->load->view('venue/venue_profile_view', $data);
        }
        else
            $this->load->view('errors/html/error_404');
    }

    public function editProfile($id) {
        $this->permissionTest();

        $this->Venue->startDatabase();
        $venue = $this->Venue->getVenue($id);
        $this->Venue->closeDatabase();

        if(!empty($venue)) {
            $data['venue'] = $venue;
            $this->load->view('venue/venue_editProfile_view', $data);
        }
        else
            $this->load->view('errors/html/error_404');
    }

    public function followVenue($idVenue) {
        if(!isset($idVenue) || empty($idVenue))
            redirect('venues', 'refresh');

        $this->Venue->startDatabase();
        $result = $this->Venue->followVenue($idVenue, $this->session->userdata('user')['idUser']);
        $this->Venue->closeDatabase();

        if(isset($_SERVER['HTTP_REFERER']))
        {
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
        else
        {
            header('Location: http://'.$_SERVER['SERVER_NAME']);
        }
        exit;
    }

    public function events($idVenue) {
        if(!isset($idVenue) || empty($idVenue))
            redirect('home', 'refresh');
        
        $data['idVenue'] = $idVenue;
        $this->Event->startDatabase();
        $data['events'] = $this->Event->readEvents($idVenue);
        $this->Event->closeDatabase();
        $this->load->view('venue/venue_event_view', $data);
    }
}