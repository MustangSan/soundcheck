<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER GIG
 *---------------------------------------------------------------
 *
 *
 *
 */

class Gigs extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('form_validation');

        $this->load->model('Gig_model', 'Gig');
        $this->load->model('Login_user_model', 'Login');

        if(!$this->Login->is_logged())
            redirect('login', 'refresh');

        if($this->session->userdata('user')['permission'] !== 'musician' && $this->session->userdata('user')['permission'] !== 'manager' && $this->session->userdata('user')['permission'] !== 'M&M')
            redirect('home', 'refresh');
    }

    public function index() {
        redirect('home', 'refresh');
        /*$this->Gig->startDatabase();
        $data['gigs'] = $this->Gig->readGigs();
        $this->Gig->closeDatabase();
        $this->load->view('gig/gig_list_view', $data);*/
    }

    public function myGigs() {
        $idUser = $this->session->userdata('user')['idUser'];
        if(!isset($idUser) || empty($idUser))
            redirect('home', 'refresh');

        $data['idUser'] = $idUser;
        $this->Gig->startDatabase();
        $data['gigs'] = $this->Gig->readGigs($idUser);
        $this->Gig->closeDatabase();
        $this->load->view('gig/gig_list_view', $data);
    }

    public function createGig() {
        $idUser = $this->session->userdata('user')['idUser'];
        if(!isset($idUser) || empty($idUser))
            redirect('home', 'refresh');

        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
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
        $this->form_validation->set_rules('contactEmail', 'Contact Email', 'trim|required|valid_email');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'description'       => $this->input->post('description'),
                            'status'            => $this->input->post('status'),
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
                            'contactEmail'      => $this->input->post('contactEmail')
                        );
            $this->load->view('gig/gig_create_view', $data);
        }
        else {
            $data = new Gig ([  NULL,
                                $idUser,
                                $this->input->post('description'),
                                $this->input->post('status'),
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
                                $this->input->post('contactEmail')
                            ]);
            $this->Gig->startDatabase();
            $result = $this->Gig->createGig($data);
            $this->Gig->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('gigs/myGigs/'.$idUser);
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('gigs/myGigs/'.$idUser);
            }
        }
    }

    public function updateGig($id) {
        $this->Gig->startDatabase();
        $gig = $this->Gig->getGig($id);
        $this->Gig->closeDatabase();

        if(!empty($gig)) {
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');
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
            $this->form_validation->set_rules('contactEmail', 'Contact Email', 'trim|required|valid_email');

            if($this->form_validation->run() == FALSE) {
                $data = array(  'description'       => $gig->getDescription(),
                                'status'            => $gig->getStatus(),
                                'place'             => $gig->getPlace(),
                                'date'              => $gig->getDate(),
                                'country'           => $gig->getCountry(),
                                'estate'            => $gig->getEstate(),
                                'city'              => $gig->getCity(),
                                'district'          => $gig->getDistrict(),
                                'street'            => $gig->getStreet(),
                                'number'            => $gig->getNumber(),
                                'complement'        => $gig->getComplement(),
                                'zipcode'           => $gig->getZipcode(),
                                'phone'             => $gig->getPhone(),
                                'contactEmail'      => $gig->getContactEmail()
                            );
            $this->load->view('gig/gig_update_view', $data);
            }
            else {
                $data = new Gig ([  $gig->getIdGig(),
                                    $gig->getIdUser(),
                                    $this->input->post('description'),
                                    $this->input->post('status'),
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
                                    $this->input->post('contactEmail')
                                ]);
                $this->Gig->startDatabase();
                $result = $this->Gig->updateGig($data);
                $this->Gig->closeDatabase();

                if($result) {
                    $this->session->set_flashdata('result', 'updateSuccess');
                    redirect('gigs/myGigs/'.$this->session->userdata('user')['idUser']);
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('gigs/myGigs/'.$this->session->userdata('user')['idUser']);
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }
}