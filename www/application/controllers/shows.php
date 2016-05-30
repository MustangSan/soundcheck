<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER SHOW
 *---------------------------------------------------------------
 *
 *
 *
 */

class Shows extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('form_validation');

        $this->load->model('Show_model', 'Show');
        $this->load->model('Login_user_model', 'Login');

        if(!$this->Login->is_logged())
            redirect('login', 'refresh');

        if($this->session->userdata('user')['permission'] !== 'musician' && $this->session->userdata('user')['permission'] !== 'M&M')
            redirect('home', 'refresh');
    }

    public function index() {
        redirect('home', 'refresh');
        /*$this->Show->startDatabase();
        $data['shows'] = $this->Show->readShows();
        $this->Show->closeDatabase();
        $this->load->view('show/show_list_view', $data);
        */
    }

    public function myShows($idBand = NULL) {
        if(!isset($idBand) || empty($idBand))
            redirect('home', 'refresh');
        
        $data['idBand'] = $idBand;
        $this->Show->startDatabase();
        $data['shows'] = $this->Show->readShows($idBand);
        $this->Show->closeDatabase();
        $this->load->view('show/show_list_view', $data);
    }

    public function createShow($idBand = NULL) {
        if(!isset($idBand) || empty($idBand))
            redirect('home', 'refresh');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('timetable', 'Timetable', 'trim|required');
        $this->form_validation->set_rules('place', 'Place', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'name'          => $this->input->post('name'),
                            'description'   => $this->input->post('description'),
                            'date'          => $this->input->post('date'),
                            'timetable'     => $this->input->post('timetable'),
                            'place'         => $this->input->post('place')
                        );
            $data['idBand'] = $idBand;
            $this->load->view('show/show_create_view', $data);
        }
        else {
            $data = new Show ([ NULL,
                                $idBand,
                                NULL,
                                $this->input->post('name'),
                                $this->input->post('description'),
                                $this->input->post('date'),
                                $this->input->post('timetable'),
                                $this->input->post('place')
                            ]);
            $this->Show->startDatabase();
            $result = $this->Show->createShow($data);
            $this->Show->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('shows/myShows/'.$idBand);
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('shows/myShows/'.$idBand);
            }
        }
    }

    public function updateShow($id = NULL) {
        if(!isset($id) || empty($id))
            redirect('home', 'refresh');

        $this->Show->startDatabase();
        $show = $this->Show->getShow($id);
        $this->Show->closeDatabase();

        if(!empty($show)) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            $this->form_validation->set_rules('date', 'Date', 'trim|required');
            $this->form_validation->set_rules('timetable', 'Timetable', 'trim|required');
            $this->form_validation->set_rules('place', 'Place', 'trim|required');

            if($this->form_validation->run() == FALSE) {
                $data = array(  'name'          => $show->getName(),
                                'description'   => $show->getDescription(),
                                'date'          => $show->getDate(),
                                'timetable'     => $show->getTimetable(),
                                'place'         => $show->getPlace()
                            );
                $data['idBand'] = $show->getIdBand();
                $this->load->view('show/show_update_view', $data);
            }

            else {
                $data = new Show ([ $show->getIdShow(),
                                    $show->getIdBand(),
                                    $show->getIdTour(),
                                    $this->input->post('name'),
                                    $this->input->post('description'),
                                    $this->input->post('date'),
                                    $this->input->post('timetable'),
                                    $this->input->post('place')
                                ]);
                $this->Show->startDatabase();
                $result = $this->Show->updateShow($data);
                $this->Show->closeDatabase();

                if($result) {
                    $this->session->set_flashdata('result', 'updateSuccess');
                    redirect('shows/myShows/'.$show->getIdBand());
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('shows/myShows/'.$show->getIdBand());
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }
}