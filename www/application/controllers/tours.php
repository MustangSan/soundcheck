<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * CONTROLLER TOUR
 *---------------------------------------------------------------
 *
 *
 *
 */

class Tours extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('Library');
        $this->load->library('form_validation');

        $this->load->model('Tour_model', 'Tour');
        $this->load->model('Show_model', 'Show');
        $this->load->model('Login_user_model', 'Login');

        if(!$this->Login->is_logged())
            redirect('login', 'refresh');

        if($this->session->userdata('user')['permission'] !== 'musician' && $this->session->userdata('user')['permission'] !== 'M&M')
            redirect('home', 'refresh');
    }

    public function index() {
        redirect('home', 'refresh');
        /*$this->Tour->startDatabase();
        $data['tours'] = $this->Tour->readTours();
        $this->Tour->closeDatabase();
        $this->load->view('tour/tour_list_view', $data);
        */
    }

    public function myTours($idBand = NULL) {
        if(!isset($idBand) || empty($idBand))
            redirect('home', 'refresh');
        
        $data['idBand'] = $idBand;
        $this->Tour->startDatabase();
        $data['tours'] = $this->Tour->readTours($idBand);
        $this->Tour->closeDatabase();
        $this->load->view('tour/tour_list_view', $data);
    }

    public function createTour($idBand = NULL) {
        if(!isset($idBand) || empty($idBand))
            redirect('home', 'refresh');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('beginDate', 'Begin Date', 'trim|required');
        $this->form_validation->set_rules('endDate', 'End Date', 'trim|required');

        if($this->form_validation->run() == FALSE) {
            $data = array(  'name'          => $this->input->post('name'),
                            'description'   => $this->input->post('description'),
                            'beginDate'     => $this->input->post('beginDate'),
                            'endDate'       => $this->input->post('endDate')
                        );
            $data['idBand'] = $idBand;
            $this->load->view('tour/tour_create_view', $data);
        }
        else {
            $data = new Tour ([ NULL,
                                $idBand,
                                $this->input->post('name'),
                                $this->input->post('description'),
                                $this->input->post('beginDate'),
                                $this->input->post('endDate')
                            ]);
            $this->Tour->startDatabase();
            $result = $this->Tour->createTour($data);
            $this->Tour->closeDatabase();

            if($result) {
                $this->session->set_flashdata('result', 'createSuccess');
                redirect('tours/myTours/'.$idBand);
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('tours/myTours/'.$idBand);
            }
        }
    }

    public function updateTour($id = NULL) {
        if(!isset($id) || empty($id))
            redirect('home', 'refresh');

        $this->Tour->startDatabase();
        $tour = $this->Tour->getTour($id);
        $this->Tour->closeDatabase();

        if(!empty($tour)) {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            $this->form_validation->set_rules('beginDate', 'Begin Date', 'trim|required');
            $this->form_validation->set_rules('endDate', 'End Date', 'trim|required');

            if($this->form_validation->run() ==FALSE) {
                $data = array(  'name'          => $tour->getName(),
                                'description'   => $tour->getDescription(),
                                'beginDate'     => $tour->getBeginDate(),
                                'endDate'       => $tour->getEndDate()
                            );
                $data['idBand'] = $tour->getIdBand();
                $this->load->view('tour/tour_update_view', $data);
            }
            else {
                $data = new Tour ([ $tour->getIdTour(),
                                    $tour->getIdBand(),
                                    $this->input->post('name'),
                                    $this->input->post('description'),
                                    $this->input->post('beginDate'),
                                    $this->input->post('endDate')
                                ]);
                $this->Tour->startDatabase();
                $result = $this->Tour->updateTour($data);
                $this->Tour->closeDatabase();

                if($result) {
                    $this->session->set_flashdata('result', 'updateSuccess');
                    redirect('tours/myTours/'.$tour->getIdBand());
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('tours/myTours/'.$tour->getIdBand());
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }

    public function myTourShows($idBand = NULL, $idTour = NULL) {
        if((!isset($idBand) || empty($idBand)) || (!isset($idTour) || empty($idTour)))
            redirect('home', 'refresh');
        
        $data['idBand'] = $idBand;
        $data['idTour'] = $idTour;
        $this->Show->startDatabase();
        $data['shows'] = $this->Show->readShows($idBand, $idTour);
        $this->Show->closeDatabase();
        $this->load->view('show/show_list_view', $data);
    }

    public function createShow($idBand = NULL, $idTour = NULL) {
        if((!isset($idBand) || empty($idBand)) || (!isset($idTour) || empty($idTour)))
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
                                $idTour,
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
                redirect('tours/myTourShows/'.$idBand.'/'.$idTour);
            }
            else {
                $this->session->set_flashdata('result', 'createError');
                redirect('tours/myTourShows/'.$idBand.'/'.$idTour);
            }
        }
    }

    public function updateShow($idShow = NULL) {
        if(!isset($idShow) || empty($idShow))
            redirect('home', 'refresh');

        $this->Show->startDatabase();
        $show = $this->Show->getShow($idShow);
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
                    redirect('tours/myTourShows/'.$show->getIdBand().'/'.$show->getIdTour());
                }
                else {
                    $this->session->set_flashdata('result', 'updateError');
                    redirect('tours/myTourShows/'.$show->getIdBand().'/'.$show->getIdTour());
                }
            }
        }
        else
            $this->load->view('errors/html/error_404');
    }
}